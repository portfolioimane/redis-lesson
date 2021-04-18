  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
    <h1>New Users</h1>
    <ul>
        <li v-repeat="user: users">@{{user}}</li>
    </ul>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.6/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.min.js"></script>
    <script>
    var socket = io('http://localhost:3000');
        new Vue({
            el: 'body',
            data:{
                users:[]
            },
            ready: function () {
                socket.on('laravel_database_test-channel:App\\Events\\UserSignedUp', function(data){
                  //  console.log(data);
                    this.users.push(data.username);
                }.bind(this));
            }
        })
    </script>
    </body>
</html>