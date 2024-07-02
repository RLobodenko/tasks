<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="conteiner">
        <form id='form'>
            <select name='UserMove'>
                <option value='stone'>Stone</option>
                <option value='paper'>Paper</option>
                <option value='scissors'>Scissors</option>
            </select>
            <button>Submit</button>
        </form>
        <div id="res"></div>
        <br />
        <button onclick="generateKey()">Generate New Key</button>
    </div>
    <script>
        function generateKey(){
            fetch('generate.php')
            .then(response=>response.text())
            .then(data=>alert('New key \n' + data))
            .catch(error=>console.error('Error',error));
        }
        document.getElementById('form').addEventListener('submit', function(event){
            event.preventDefault();
            const formData = new FormData(this);
            fetch('1.php', {
                method: 'POST',
                body: formData
            })
            .then(response=>response.text())
            .then(data=>{
                document.getElementById('res').innerHTML = data
            })
            .catch(error=>console.error('Error',error));
        });
    </script>
</body>
</html>