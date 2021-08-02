<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>TODO</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 style="text-align:center">ToDo List</h1>
        <br>
        <form action="/post_lists" method="POST">
            @csrf
            <div align="center">
                <table border="1">
                    <tr>
                        <th>Task</th>
                        <th>Start Time</th>
                        <th>Finish Time</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="post_list[task]" placeholder="タスク名" value="{{ old('post_list.task') }}"/>
                        </td>
                        <td>
                            <input type="datetime-local" name="post_list[start_time]" placeholder="開始時刻" value="{{ old('post_list.start_time') }}"/>
                        </td>
                        <td>
                            <input type="datetime-local" name="post_list[finish_time]" placeholder="終了時刻" value="{{ old('post_list.finish_time') }}"/>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="追加"/>
            </div>
        </form>

        <br>
        <table border="1" align="center">
            <tr>
                <th>Task</th>
                <th>Start Time</th>
                <th>Finish Time</th>
                <th>Limit Time</th>
            </tr>
            @foreach ($post_lists as $post_list)
                <tr>
                    <td><p>{{ $post_list->task }}</p></td>
                    <td><p>{{ $post_list->start_time }}</p></td>
                    <td><p>{{ $post_list->finish_time }}</p></td>
                    <?php
                        $now = new Carbon\Carbon();
                        $finish = new Carbon\Carbon($post_list->finish_time);
                        $diff_sec = $finish->diffInSeconds($now);
                        $diff_day = gmdate("z", $diff_sec);
                        $diff_date = gmdate("H:i:s", $diff_sec);
                    ?>
                    <td><p>{{ $diff_day }}日 {{ $diff_date }}</p></td>
                    <td>
                        <form action="/post_lists/{{ $post_list->id }}" id="form_delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" style="display:none">
                            <p class='delete'>[<span onclick="return deletePost(this);">×</span>]</p>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <script>
            function deletePost(e){
                'use strict';
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>
