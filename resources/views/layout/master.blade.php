
<!DOCTYPE html>
<html itemscope itemtype="" ng-app="app" class="">
<head>
    <title>Invoicing
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Make attractive, professional invoices in a single click with the invoice generator trusted by millions of people." />

    <!-- Open Graph -->

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/logo')}}"/>


    <link href="{{asset('css/1.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('css/2.css')}}" type="text/css" rel="stylesheet" />




</head>
<body>
    <div id="fb-root"></div>


    <div class="background"></div>

    <div class="navbar navbar-invoiced">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">
                    Invoice Management
                </a>
            </div>

        </div>
    </div>
    <div class="container scrollable">
        <div class="papers">
            <div class="invoice">
                <div class="two-col clearfix">
                    @yield('page-body')



                </div>
            </div>
        </div>
    </div>
</body>

<script language="Javascript" type="text/javascript">
    var counter = 1;
    var limit = 3;
    function addInput(divName){
        if (counter == limit)  {
            alert("You have reached the limit of adding " + counter + " inputs");
        }
        else {
            var newdiv = document.createElement('div');
            newdiv.innerHTML = "Project " + (counter + 1) + " <br><input type='text' name='myInputs[]'>";
            document.getElementById(divName).appendChild(newdiv);
            counter++;
        }
    }
</script>
