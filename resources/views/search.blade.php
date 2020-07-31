
@extends('includes.layout')

@section('title')
    Search
@endsection

@section('initialscripts')
    <script async src="https://cse.google.com/cse.js?cx=011965659370381653902:7awkdkhs2_y" async defer></script>
@endsection

@section('content')

    <section id="standard" class="standard-area pt-5 mt-md-3 mt-lg-3 first">
        <div class="container mx-auto mt-5 mt-lg-0 mt-md-5">
            <div class="row justify-content-center mt-5">

                <div class="col-md-12 col-sm-12 mt-5">
                    @include('includes.alert')
                </div>

                    <div class="offset-md-2 col-md-10 col-sm-12 mb-3">
                        <div style="width:100%;  padding: 0px;" class="mx-auto">
                            <div id='div-gpt-ad-1506941653033-0' style='width:100%;'>
                                <script>
                                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1506941653033-0'); });
                                </script>
                            </div>
                        </div>
                    </div>


                    <div class="col span_2_of_3 aut">

                        <div class="card bg-white art">
                            <div class="card-body">
                                <h3 class="card-title titles"> Search Results</h3>
                                <p class="card-text">
                                    <small class="text-muted"> </small>
                                </p>
                            </div>

                            <div class="card-body">
                                <div class="gcse-searchresults-only"></div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>

@endsection

@section('js')

@endsection
