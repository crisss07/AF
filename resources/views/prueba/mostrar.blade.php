<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Informaci&oacute;n del Activo Fijo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- contenido del modal -->
            <div class="col-md-6 col-sm-12">
                <div class="portlet blue-hoki box">
                    
                    <div class="portlet-body">
                        <div class="row static-info">
                            <div style="margin-left: 10px; margin-right: 10px; background-color: yellow;"> C&oacute;digo de Activo: </div>
                            <div style="background-color: blue; float: left;"> MPD-0004-0003 </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name"> Email: </div>
                            <div style="background-color: blue; float: left;"> jhon@doe.com </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name" style="background-color: red;"> State: </div>
                            <div style="background-color: blue; float: left;"> New York </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name" style="background-color: red;"> Phone Number: </div>
                            <div style="background-color: blue; float: left;"> 12234389 </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>




</body>
</html>





