<!doctype html>
<html lang="en">

<head>
  <title>Dashboard </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="{{asset('admin/css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
  <style>
    .category{
      cursor: pointer;
    }
  </style>
  @yield('css')
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{asset('admin/img/sidebar-2.jpg')}}">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo">
        <a href="/" class="simple-text logo-normal">
          {{ config('app.name', 'Laravel') }}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item @if ( Route::currentRouteName() == 'home') active  @endif ">
            <a class="nav-link" href="{{route('home')}}">
              <p>Dashboard  </p>
            </a>
          </li>
          <!-- your sidebar here -->   

          {{-- personal Information  --}}

          <li class="nav-item @if ( Route::currentRouteName() == 'accounts.show') active  @endif">
            <a class="nav-link" href="{{route('accounts.show', auth()->user()->id)}}">
              <p>show Account</p>
            </a>
          </li>

          {{-- manage accounts --}}
          @if (Gate::allows('manageAcount'))
                    <li class="nav-item @if ( Route::currentRouteName() == 'accounts.index') active  @endif">
            <a class="nav-link" href="{{route('accounts.index')}}">
              <p>Manage Accounts</p>
            </a>
          </li>
 
          @endif
          @if (Gate::allows('manageAcount'))
            <li class="nav-item @if ( Route::currentRouteName() == 'transfer.index') active  @endif">
              <a class="nav-link" href="{{route('transfer.index')}}">
                <p> Transfers</p>
              </a>
            </li>
          @endif  
          
          
          {{-- Request Transfer --}}
          @if (Gate::allows('member'))

          <li class="nav-item @if ( Route::currentRouteName() == 'transfer.index') active  @endif">
            <a class="nav-link" href="{{route('transfer.index')}}">
              <p>Request Transfer</p>
            </a>
          </li>

          @endif

             {{-- Group --}}
            @if (Gate::allows('member') ||Gate::allows('manageAcount') )
             <li class="nav-item @if ( Route::currentRouteName() == 'group.index') active  @endif">
              <a class="nav-link" href="{{route('group.index')}}">
                <p>Groups</p>
              </a>
            </li>
          @endif

           {{-- Report --}}
           @if (Gate::allows('treasurer') || Gate::allows('manageAcount') )
            <li class="nav-item @if ( Route::currentRouteName() == 'report') active  @endif">
              <a class="nav-link" href="{{route('report')}}">
                <p>Reports</p>
              </a>
            </li>
          @endif
          @if (Gate::allows('secretary') || Gate::allows('manageAcount') )
            <li class="nav-item @if ( Route::currentRouteName() == 'broadcast.index') active  @endif">
              <a class="nav-link" href="{{route('broadcast.index')}}">
                <p>Events | Announcements</p>
              </a>
            </li>
          @endif
          @if (Gate::allows('secretary'))
            <li class="nav-item @if ( Route::currentRouteName() == 'calender.index') active  @endif">
              <a class="nav-link" href="{{route('calender.index')}}">
                <p>Calender</p>
              </a>
            </li>
          @endif
          <li class="nav-item @if ( Route::currentRouteName() == 'payment.index') active  @endif">
            <a class="nav-link" href="{{route('payment.index')}}">
              <p>Payments</p>
            </a>
          </li>
          @if (Gate::allows('admin'))
          <li class="nav-item @if ( Route::currentRouteName() == 'outstation.index') active  @endif">
            <a class="nav-link" href="{{route('outstation.index')}}">
              <p>outstations</p>
            </a>
          </li>
          @endif


          {{-- End --}}

          {{-- from the other --}}
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard : {{auth()->user()->role->name}}  </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" action="{{route('adminSearch.store')}}" method="POST">
              @csrf
              <span class="bmd-form-group"><div class="input-group no-border">
                <input type="text" value="" name="search" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div></span>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">messages</i>
                  <span class="notification"> {{auth()->user()->notifications->count()}} </span>
                  <p class="d-lg-none d-md-block">
                    Messages
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
                  @foreach (auth()->user()->notifications as $notification)
                       <a class="dropdown-item" href="{{route('deleteNotification', $notification->id)}}">{{$notification->data['message']}}</a>
                  @endforeach
                 
                </div>
              </li>
              <li class="nav-item dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">notifications</i>
                  <span class="notification events"></span>
                  <p class="d-lg-none d-md-block">
                    Notifications
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right notificationPreview" aria-labelledby="navbarDropdownMenuLink">
                 
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  <i class="material-icons">logout</i>
                  <p class="d-lg-none d-md-block">
                    Logout
                  </p>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          {{-- flash notifications --}}
          <div class="row">
            <div class="col-md-12">
              
              @if (session('status'))
                <div class="alert alert-info">
                  <span>{{session('status')}}</span>
                </div>
              @endif
              @if (session('error'))
                <div class="alert alert-danger">
                  <span>{{session('error')}}</span>
                </div>
              @endif
            
              @if ($errors->any())
                  
                  <div class="alert alert-danger">
                    <span>{{$errors}}</span>
                  </div>
                  
              @endif


            </div>
          </div>

          @yield('content')


        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  Jason Kandoje
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>@ <i class="material-icons"></i> Jason CR7 Kandoje
            <a href="{{ config('app.name', 'Laravel') }}" target="_blank">All Rights Reserved.</a>
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-cog fa-2x">Print</i>
      </a>
      <ul class="dropdown-menu" id="print" x-placement="top-start" style="position: absolute;  left: -231px; will-change: top, left;">
        <li class="header-title">Print | Download</li>
        <li class="button-container">
          <a href="#" class="btn btn-primary btn-block" onclick="document.getElementById('print').style.display = 'none' ; print(); document.getElementById('print').style.display = 'block' ">Print</a>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('admin/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('admin/js/core/popper.min.js')}}"></script>
  <script src="{{asset('admin/js/core/bootstrap-material-design.min.js')}}"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="{{asset('admin/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
 
  <!-- Chartist JS -->
  <script src="{{asset('/admin/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('/admin/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('/admin/js/material-dashboard.js?v=2.1.0')}}"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->



  <script>
 
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
      // my scripts

      /*
      *ajax request for getting notification
      */
      $.get('{{route('get_nots')}}',function(data){
        $('.events').text(data.length);
        
        for (const notification of data) {
          console.log(notification.data.message);
          $('.notificationPreview').append(`<a class="dropdown-item" href="javascript:void(0)">${notification.data.message.substr(0,20)}...</a>`)
        }
        
      } )
      

    });
  </script>
  @yield('script')
</body>

</html>