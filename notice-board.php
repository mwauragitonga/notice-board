<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Meta  -->
    <meta charset="UTF-8"/>
    <title>Notice Board</title>
    <!--  Styles  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

<section >
    <div class="container col-lg-10" style="margin-top: 10%">
        <h1>Stories</h1>
        <div class="row" id="body">

        </div>

    </div>

</section>

</body>
<footer>
    <script type="text/javascript">

        $(document).ready(function (){
               const container = document.getElementById('body');
                //call function here every second
            $.ajax({
                type: "GET",
                url: "./load_data.php",
                dataType: "json"
            }).done(function(data){
                //storing array in localStorage
                localStorage.clear();
                localStorage.setItem("stories", JSON.stringify(data));
                let content = '';

                for (let i = 0; i < data.length; i++){
                    //retrieve stored data
                    var stored = JSON.parse(localStorage.getItem("stories"));
                        // Construct card content
                        content = '  <div class="col-lg-3" ><div class="card" id="card">' +
                            '<div class="card-body"> <h5 class="card-title" id="card-title"><span>title: </span>' + stored[i]["title"]  + '</h5>' +
                            '<small class="card-subtitle mb-2 text-muted" id="card-time"><span>date posted: ' +stored[i]["date_posted"] + ' </span></small>  <br><br>' +
                            '<p class="card-text" id="card-text">' + (stored[i]["message"])  + '</p></div></div></div>'


                    //append data to fields
                    container.innerHTML += content;

                }
            })

        });
        window.setInterval(function () {
            updateStories();
        }, 3000);
        function updateStories(){
            const container = document.getElementById('body');
         let  storiesStored = (JSON.parse(localStorage.getItem("stories")));
            $.ajax({
                type: "GET",
                url: "load_data.php",
                dataType: "json"
            }).done(function(data){
                if(data.length === storiesStored.length){
                    console.log("no new data")
                }else{
                    console.log("new data found")
                    console.log(storiesStored)
                    console.log(data)
                    let content = '';
                    container.innerHTML = '';
                    for (let i = 0; i < data.length; i++){

                            // Construct card content
                            content = '  <div class="col-lg-3" ><div class="card" id="card">' +
                                '<div class="card-body"> <h5 class="card-title" id="card-title"><span>title: </span>' + data[i]["title"]  + '</h5>' +
                                '<small class="card-subtitle mb-2 text-muted" id="card-time"><span>date posted: ' +data[i]["date_posted"] + ' </span></small>  <br><br>' +
                                '<p class="card-text" id="card-text">' + data[i]["message"] + '</p></div></div></div>'

                        //append data to fields
                        container.innerHTML += content;

                    }
                }

            })
        }

    </script>

</footer>
</html>
