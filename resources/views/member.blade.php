<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Show All  Trainer</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">flex gym</span>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add New Member</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row 1">
            <!-- Sidebar -->
            <div class="col-2">
                <div class="list-group">
                    <a href="{{ route('trainer_list') }}" class="list-group-item list-group-item-action">View1 Trainers1</a>
                    <a href="{{ route('member_list') }}" class="list-group-item list-group-item-action">View1 Members1</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">MEMBER NAME</th>
                            <th scope="col">MEMBER PHONE</th>
                            <th scope="col">TRAINER ID</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <th scope="row">{{ $member->id }}</th>
                            <td>{{ $member->member_name }}</td>
                            <td>{{ $member->member_phone }}</td>
                            <td> @if ($member->trainer)
                                {{ $member->trainer->trainer_name  }}
                            @else
                                No Trainer Assigned
                            @endif
                            </td>
                            <td>
                            <form action="{{ route('edit_member', $member->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('delete_member', $member->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE') 
                                    <input type="submit" class="btn btn-danger" value="Delete" />
                                </form>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


         

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <div class="modal-header">
            <h3 class="modal-title">ADD member</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{route('member_add')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">member Name</label>
                    <input type="text" name="member_Name" placeholder="Enter Name">
                </div>
    
                <div class="form-group">
                    <label for="name">Trainer Batch</label>
                    <input type="text" name="member_phone" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label for="name">Select Trainer</label>
                    <select name="trainer_id" class="form-select">
                        <option value="">Select Trainer</option>
                        @foreach($trainers as $trainer)
                            <option value="{{ $trainer->id }}">{{ $trainer->trainer_name }}</option>
                        @endforeach
                    </select>
                </div>
    
    
                <div class="form-group">
                     <input type="submit" name="submit"  class="btn btn-success">
                </div>
              </form>
          </div>
  

  
      </div>
    </div>
  </div>
</body>
</html>