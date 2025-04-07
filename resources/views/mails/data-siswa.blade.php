<!DOCTYPE html>
<!-- Template Name: DashCode - HTML, React, Vue, Tailwind Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="zxx" dir="ltr" class="light">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>Dashcode - HTML Template</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
    </head>

    <body class=" font-inter dashcode-app" id="body_class">
        <main class="app-wrapper">
                              <!-- BEGIN: Single Email -->
                              <div class="absolute left-0 top-0 w-full h-full bg-white dark:bg-slate-800 z-[55] rounded-md p-6 " >
                                <div>
                                  <div class="text-lg font-medium text-slate-600 dark:text-slate-300">
                                    Create New Siswa
                                  </div>
                                  <div class="flex space-x-3 pt-4 pb-6 items-start rtl:space-x-reverse">
                                    <div class="flex-none">
                                      <div class="h-8 w-8 rounded-full text-white">
                                        <img src="assets/images/avatar/av-1.svg" alt="" class="block w-full h-full object-cover">
                                      </div>
                                    </div>
                                    <div class="flex-1">
                                      <span class="text-sm text-slate-600 dark:text-slate-300 font-medium leading-4">
                           Superadmin
                      </span>
                                    </div>
                                  </div>
                                  <div class="text-sm text-slate-600 dark:text-slate-300 font-normal">
                                    New Siswa Added. <br/> <br/> <br/> 
                                    <ul>
                                        <li>
                                            nisn : {{ $data['nisn'] }}
                                        </li>
                                        <li>
                                            name : {{ $data['nama'] }}
                                        </li>
                                        <li>
                                            phone : @foreach ($data['phone_number'] as $phone)
                                            {{ $phone }},
                                                    @endforeach
                                        </li>
                                        <li>
                                            hobby : @foreach ($hobbies as $key => $hobby)
                                            {{ $hobby }},
                                                    @endforeach
                                        </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <!-- END: Single Email -->
                            </div>
                          </div>
                        </div>
                      </div>

  <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>