<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            @php
                                $value = App\Models\User::where('email', Session::get('email'))->first();                                
                            @endphp
                            <span>
                                <img alt="image" class="img-circle" src="images/{{$value->image}}" width="50%" />
                            </span>
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{$value->name}}</strong>                            
                        </span>
                    </a>                    
                </div>
                <div class="logo-element">
                    WPU
                </div>
            </li>
            <li class="{{ isActiveRoute('dashboard') }}">
                <a href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt"></i></i> <span class="nav-label">Dashboard</span></a>
            </li>
            @if(Session::has('email'))                
                @forelse (App\Models\User::with('roles.menus.subMenus')->where('email', Session::get('email'))->get()->all() as $tant)                    
                    @foreach ($tant->roles as $item)                    
                        @foreach ($item->menus as $menu)
                        <li>                            
                            <a href="#"><i class="{{$menu->icon}}"></i></i>
                                <span class="nav-label">{{ $menu->title}}</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level collapse">
                            @foreach ($menu->subMenus as $sub)                                                        
                                <li class="{{ isActiveRoute($sub->url) }}" ><a href="{{ route($sub->url) }}"><i class="{{$sub->icon}}"></i><span class="nav-label mask-child-menu">{{ $sub->title}}</span> </a></li>                                                                                        
                                
                            @endforeach
                            </ul>
                        </li>                      
                        @endforeach                    
                    @endforeach
                @empty
                    <p>No users</p>
                @endforelse                        
            @endif                                     
        </ul>
    </div>
</nav>
