<?php
require_once('dbhelp.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Quản lý sinh viên
            </div>
            <div class="panel-body">
                <table class="table table-bordered  ">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ và Tên</th>
                            <th>Tuổi</th>
                            <th>Địa chỉ</th>
                            <th>Chỉnh sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'SELECT *FROM student';
                        $studentList = executeResult($sql);
                        $index=1;
                        foreach ($studentList as $std) {
                            echo '<tr>
                                    <td>'.($index++).'</td>
                                    <td>'.$std['fullName'].'</td>
                                    <td>'.$std['age'].'</td>
                                    <td>'.$std['address'].'</td>
                                    <td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['id'].'","_self")\'>Edit</button></td>
                                    <td><button class="btn" onclick="deleteStudent('.$std['id'].')">Delete</button></td>
                                </tr>';
                        }
                        ?>

                    </tbody>
                </table>
                <button class="btn btn-success" onclick="window.open('input.php','_self')">Add Student</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function deleteStudent(id){
            option = confirm('Mày muốn xoá thật không?')
            if(!option){
                return ;
            }
            console.log(id);
            $.post('delete_student.php', {
                'id':id
            }, function(data){
                alert(data)
                location.reload()
            })
        }
    </script>

</body>

</html>
