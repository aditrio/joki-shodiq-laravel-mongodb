<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{route('store.test')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="nama">nama</label>
                      <input type="text" class="form-control" id="nama" name="name" placeholder="Name">
                      
                    </div>
                    <div class="form-group">
                      <label for="nim">nim</label>
                      <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

                  <br>
                  <br>
                  
                 
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Action</th>

                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $row)
                        <tr>
                            <td scope="row">{{$key+1}}</td>
                            <td hidden>{{$row->id}}</td>
                            
                            <td>{{$row->name}}</td>
                            <td>{{$row->nim}}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editmodal">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#deletemodal">
                                    Delete
                                </button>

                            </td>
                            
                        </tr>
                       @endforeach
                     
                    </tbody>
                  </table>
                  



            </div>
        </div>
    </div>


    <br>

<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Test</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="form-edit" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="nama">nama</label>
                  <input type="text" class="form-control" id="nama-edit"   name="name" placeholder="Name">
                  
                </div>
                <div class="form-group">
                  <label for="nim">nim</label>
                  <input type="text" name="nim" class="form-control" id="nim-edit"  placeholder="NIM">
                </div>
                
                
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
      </div>
    </div>
  </div>


<!-- Modal delete-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Test</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="form-delete" method="post">
                {{method_field('DELETE')}}
                @csrf
            <p>Data akan dihapus secara permanen</p>         
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        </div>
      </div>
    </div>
  </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        $('.btn-edit').click(function () { 
           var $row = $(this).closest('tr');
           var $data_id = $row.find("td:nth-child(2)");
           var $data_name = $row.find("td:nth-child(3)");
           var $data_nim = $row.find("td:nth-child(4)");
           
            
           console.log($data_id.text(), " ", $data_name.text(), " ", $data_nim.text());

            $('#nama-edit').attr('value', $data_name.text());
            $('#nim-edit').attr('value', $data_nim.text());
            $('#form-edit').attr('action' ,'/test/'+$data_id.text()+'/update');
            $('#form-delete').attr('action' ,'/test/'+$data_id.text()+'/delete');

        });

        $('.btn-delete').click(function(){

            var $row = $(this).closest('tr');
            var $data_id = $row.find("td:nth-child(2)");
            $('#form-delete').attr('action' ,'/test/'+$data_id.text()+'/delete');
        });
    </script>
  </body>
</html>