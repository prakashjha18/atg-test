<html>
    <head>
        <meta charset="utf-8">
        <title>Contact US</title>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Contact us</a>
              </div>
              <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li> <a href="http://localhost:8000/listing">Listings</a></li>
                  
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </nav>
          
          <div class="container">
                <div id="added"></div>
              <h1>Add listing</h1>
              <form id="itemForm">
                  <div class="form-group">
                    <label>name :</label>
                    <input type="text" id="name" class="form-control">
                    <span class="text-danger" id="nam"></span>
                  </div>
                  <div class="form-group">
                        <label>email :</label>
                        <input type="email" id="email" class="form-control">
                        <span class="text-danger" id="emai"></span>
                    </div>
                    <div class="form-group">
                        <label>pincode :</label>
                        <input type="number" id="pincode" class="form-control">
                        <span class="text-danger" id="zip"></span>
                    </div>
                   <input type="submit" vlaue="submit" class="btn btn-primary" id="myBtn">
                   
                  
              </form>
              
              <hr>
              <ul id="items" class="list-group">

              </ul>
           </div>
<script>
    
    document.getElementById('pincode').addEventListener('keyup', validateZip);
    document.getElementById('email').addEventListener('keyup', validateEmail);
    function validateEmail() {
  const email = document.getElementById('email');
  const re = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
 console.log(email.value);
  if(!re.test(email.value)){
    email.classList.add('is-invalid');
    document.getElementById("emai").innerHTML = "this is not a proper email";
  } else {
    email.classList.remove('is-invalid');
    document.getElementById("emai").innerHTML = "";
  }
}
function validateZip() {
  const zip = document.getElementById('pincode');
  const re = /^[0-9]{6}$/;
    console.log(zip.value);
  if(!re.test(zip.value)){
    zip.classList.add('is-invalid');
    document.getElementById("zip").innerHTML = "pincode should be 6 digit";
  } else {
    zip.classList.remove('is-invalid');
    document.getElementById("zip").innerHTML = "";
  }
}
</script>

        <script
            src="https://code.jquery.com/jquery-1.12.4.js"
            integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
            crossorigin="anonymous">
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
            //getItems();

            $('#itemForm').on('submit', function(e){
                e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let pincode = $('#pincode').val();
                addItem(name, email, pincode);
            });

            $('body').on('click','.deleteLink', function(e){
                e.preventDefault();
                let id = $(this).data('id');
                deleteItem(id);
            });

            

            function addItem(name, email, pincode){
                $.ajax({

                    method:'POST',
                    url:'http://localhost:8000/user',
                    data: {name:name, email:email, pincode:pincode},
                    context :document.getElementById("myBtn").disabled = true

                }).done(function(item){
                    
                    document.getElementById("myBtn").disabled = false;
                    let htmls = "";
                    if(item.status=='1')
                    {
                        htmls = `<div class="alert alert-success alert-dismissible fade in" id="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> your response has been recorded
                    </div>`;
                    }
                    else {
                        htmls = `<div class="alert alert-danger alert-dismissible fade in" id="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>failed!</strong> ${item.message}
                    </div>`
                    document.getElementById("email").value = "";
                    }
                    $('#added').append(htmls);
                    setTimeout(function(){
                    $('#alert').remove();
                    }, 2200);
                    // document.getElementById("email").value = "";
                    // document.getElementById("name").value = "";
                    // document.getElementById("pincode").value = "";
                });
            }

            // function getItems(){
            //     $.ajax({
            //         url:'http://localhost:8000/user'
            //     }).done(function(items){
            //         let output = '';
            //         $.each(items,function(key,item){
            //             output += `
            //             <li class="list-group-item"><strong>ID : ${item.id}</strong></a></li>
            //                 <li class="list-group-item">${item.name}</a></li>
            //                 <li class="list-group-item">${item.email}</a></li>
            //                 <li class="list-group-item">${item.pincode}</a></li><br>
            //             `;
            //         });
            //         $('#items').append(output);
            //     });
            // }
        });
        </script>
    </body>
    </head>
</html>