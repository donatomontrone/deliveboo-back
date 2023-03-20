<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4  text-center">
            <div class="logo mb-3">
                <svg width="120px" height="120px" viewBox="0 0 121 132" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Artboard" transform="translate(-103.000000, -26.000000)" fill-rule="nonzero">
                            <g id="Group" transform="translate(103.000000, 26.000000)">
                                <polygon id="Shape-path-Copy-3" fill="#00CCBC" points="80.6875476 58.2054 70.1471635 9.1344 37.1074305 16.08915 47.6395671 65.16015 0 75.17895 8.41251314 114.378 92.191247 132 111.348684 89.40855 120.463889 3.498 86.863322 0"></polygon>
                                <path d="M53.958849,85.0608 C51.5406639,84.2655 50.4651818,81.36975 51.3823107,77.8668 C52.0652088,75.26805 55.2784589,74.8803 56.8867335,74.8506 C57.4970531,74.8407 58.0991251,74.9628 58.6517117,75.2103 C59.7898753,75.7218 61.7148562,76.8075 62.1057907,78.46575 C62.6715734,80.85825 62.1272343,82.8663 60.4001949,84.43215 C58.6682069,86.0046 56.3852817,85.86105 53.9604985,85.06245 L53.958849,85.0608 Z" id="Shape-path-Copy-2" fill="#ffffff"></path>
                                <path d="M76.8573799,88.011 C74.6734255,86.9517 74.6899206,84.25395 74.9274504,82.6089 C75.0561124,81.71295 75.4190051,80.86815 75.9864373,80.15535 C76.7666567,79.17525 78.0697715,77.8998 79.5741268,77.86185 C82.0236527,77.79585 84.13008,78.88485 85.3193784,80.85165 C86.5136254,82.81185 85.9165019,84.97335 84.6595734,87.13815 C83.3943974,89.2947 80.1003212,89.58015 76.8573799,88.00935 L76.8573799,88.011 Z" id="Shape-path-Copy" fill="#ffffff"></path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <h1>{{$code}}</h1>
            <h5 class="mb-4">{{ $exception->getMessage() }}</h5>
            <p><a class="text-success" href="{{route('admin.dashboard')}}">Dashboard</a></p>
        </div>
    </div>
</div>