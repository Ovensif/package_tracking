<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPS TRACKER</title>
    <link href="{{asset('assets/bootstrap5.2/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container">

        <div class="row d-flex justify-content-center pt-4">
            <div class="col-sm-12 px-0">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="trackingNumber" style="height: 100px"></textarea>
                    <label for="floatingTextarea2" id="labelMessage">Tracking Number</label>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-end pt-1">
            <div class="row col-sm-2">
                <button type="button" class="btn btn-primary" id="search">Search</button>
            </div>
        </div>
        <div class="row d-flex justify-content-center pt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tracking Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Shipped / Bill Date</th>
                        <th scope="col">Dilivered Date</th>
                        <th scope="col">Ship To</th>
                        <th scope="col">Service</th>
                    </tr>
                </thead>
                <tbody id="result_tracking">
                </tbody>
            </table>
            <div style="text-align: center; display:none;" id='image-loading'>
                <img src="{{asset('img/loading.gif')}}" alt="Girl in a jacket" width="50" height="50">
            </div>
        </div>
    </div>
</body>


<script src="{{asset('assets/bootstrap5.2/boostrap.min.js')}}"></script>
<script src="{{asset('assets/js/jQuery/jQuery.3.6.1.js')}}"></script>
<script src="{{asset('dist/trackingNumber.js')}}"></script>

</html>