<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
            {{-- jika request adalah url dari dashboard --}}
          <a class="nav-link {{ Request::is('dashboard')? 'active' : ''  }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
              Dashboard
          </a>
        </li>


        <li class="nav-item">
          {{--  * menandakan apapun yang ada setelah tanda  dashboard/posts akan membuat menu ini active --}}
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : ''  }}" href="/dashboard/posts">
            <span data-feather="file-text"></span>
            My Posts
          </a>
        </li>



      </ul>


{{-- penggunaan gate dan hannya muncul ketika admin login  --}}
{{-- @can('nama gate') dari file AppServiceProvider --}}
      @can('admin')
        
      
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      
      <ul class="nav flex-column">
        <li class="nav-item">   
           {{--  * menandakan apapun yang ada `setelah tanda  dashboard/posts akan membuat menu ini active --}}
           <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : ''  }}" href="/dashboard/categories">
            <span data-feather="grid"></span>
            Post Categories 
          </a> 
        </li>
      </ul>

      @endcan


    </div>
  </nav>