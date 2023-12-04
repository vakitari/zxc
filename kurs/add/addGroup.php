<?php
include "../style/header.php";
$data = [];
?>

    <div class="col-12">
        <h1>Страница добавления группы </h1>
        <h5 class="mt-4">Название группы</h5>
        <div class="col-12 mt-2 d-flex justify-content-between">
            <div class="col-2">
                    <input type="text" class="form-control" name="groupName" placeholder="ИС-4">
            </div>
            <button onclick="location.href='../test.php';" class="btn btn-secondary p-3" id="submitAll" type="button">Добавить группу</button>
        </div>

        <div class="mt-3">
          <h4>  Cтудент</h4>
        </div>

    </div>
    <form action="" method="POST">
        <div class="col-5">
            <label class="form-label mt-3"  > Фамилия</label>
            <input class="form-control mt-1 " name="name">
            <label class="form-label mt-3"  > Имя</label>
            <input class="form-control mt-1" name="surname" >
            <label class="form-label mt-3"  > Отчество</label>
            <input class="form-control mt-1" name="lastname" >
        </div>
        <div class="col-3">
            <button class="form-control mt-2 " id="addStudent" >Добавить студента </button>
        </div>
    </form>
    <div>
        <hr>
        <div class="result-container"></div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var formCount = 0;

            $('button#addStudent').on('click', function (event) {
                event.preventDefault();

                var name = $('input[name="name"]').val();
                var surname = $('input[name="surname"]').val();
                var lastname = $('input[name="lastname"]').val();

                var formHtml = '<div class="result" id="form_' + formCount + '"> \
                <form class="student-form d-flex justify-content-between mt-2" action=""> \
                    <input class="name" value="' + name + '" type="hidden"> \
                    <input class="surname" value="' + surname + '" type="hidden"> \
                    <input class="lastname" value="' + lastname + '" type="hidden"> \
                    <p class="name">'+ name +'</p> \
                    <p class="surname" >'+ surname +'</p> \
                    <p class="lastname" >'+ lastname +'</p> \
                    <button class="btn btn-danger" id="delStudent" type="button">удалить студента</button>\
                </form> \
            </div>';

                $('.result-container').append(formHtml);
                formCount++;
            });
            $(document).on('click', 'button#delStudent', function (event) {
                event.preventDefault();
                $(this).closest('.result').remove();
            });

            $('form#studentForm').on('submit', function (event) {
                event.preventDefault();
            });

            $('button#submitAll').on('click', function (event) {
                //event.preventDefault();
                var groupName = $('input[name="groupName"]').val();

                // Собираем данные со всех форм
                var formData = [];
                $('.student-form').each(function () {
                    var form = $(this);
                    var data = {
                        groupName: groupName,
                        name: form.find('.name').val(),
                        surname: form.find('.surname').val(),
                        lastname: form.find('.lastname').val(),
                    };
                    formData.push(data);
                });

                // Отправляем данные на сервер
                $.ajax({
                    type: 'POST',
                    url: '../service/AddController.php',
                    data: { students: formData },
                    success: function (response) {
                        console.log(response);
                        // Возможно, здесь вы захотите что-то сделать с ответом от сервера
                    },
                    error: function (error) {
                        console.error('Произошла ошибка при отправке данных:', error);
                    }
                });
            });
        });
    </script>
<?php
include "../style/footer.php";
?>