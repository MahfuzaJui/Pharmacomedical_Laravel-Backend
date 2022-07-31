<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" style="width:500px;">  
        <h2>Delete review</h2> 
            <form action="{{ route('deletereview') }}" method="GET">  
                
                {{csrf_field()}}
                <input type="hidden" name="doctorReviewID" value="{{review->doctorReviewID}}">
                <div class="form-group">
                    <label for="userID">Patient ID</label>
                    <input type="text" class="form-control" id="userID" name="userID" placeholder="Enter Patient ID">
                   
                </div>
                <div class="form-group">
                    <label for="doctorID">Doctor ID</label>
                    <input type="text" class="form-control" id="doctorID" name="doctorID" placeholder="Enter Doctor ID">
                    
                </div>
               
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="description">
                    
                </div>
                <div class="form-group">
                    <label for="point">Rating</label>
                    <input type="text" class="form-control" id="point" name="point" placeholder="point">
                   
                </div>
              
                <div class="form-group p-1">
                    <span>
                        <input type="submit" name="Delete" value="Delete" class="btn btn-info">
                    </span>
                </div>
                </div>
            </form> 
        </div>
    </body>
</html>              