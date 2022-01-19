<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('style')
    {{-- boxicons --}}
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('styles/layout.css') }}">

    <title>Mokyklos administravimo sistema</title>

</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxl-medium-square'></i>
                <div class="logo_name">MVS</div>
            </div>
        </div>
        <ul class="nav_list">
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details" data-tooltip="
                        @auth('teacher')
                            {{ Auth::guard('teacher')->user()->first_name }} {{ Auth::guard('teacher')->user()->last_name }}
                        @endauth
                        @auth('student')
                            {{ Auth::guard('student')->user()->first_name }} {{ Auth::guard('student')->user()->last_name }}
                        @endauth
                        , 
                        @auth('teacher')
                            @if (Auth::guard('teacher')->user()->is_admin)
                                Administratorius
                                @php $userType = 'admin.'; @endphp
                            @else
                                Mokytojas
                                @php $userType = 'teacher.'; @endphp
                            @endif
                        @endauth
                        @auth('student')
                            Mokinys
                            @php $userType = 'student.'; @endphp
                        @endauth
                    ">
                        <i class='bx bxs-user-circle' id="user_logo"></i>
                        <div class="name_job">
                            <div class="name">
                                @auth('teacher')
                                    {{ Auth::guard('teacher')->user()->first_name }} {{ Auth::guard('teacher')->user()->last_name }}
                                @endauth
                                @auth('student')
                                    {{ Auth::guard('student')->user()->first_name }} {{ Auth::guard('student')->user()->last_name }}
                                @endauth
                            </div>
                            <div class="job">Prisijungta kaip <span id="role">
                                @auth('teacher')
                                    @if (Auth::guard('teacher')->user()->is_admin)
                                        Administratorius
                                    @else
                                        Mokytojas
                                    @endif
                                @endauth
                                @auth('student')
                                    Mokinys
                                @endauth
                            </span></div>
                        </div>
                    </div>
                </div>
            </div>
            <li>
                <a href="{{ route($userType . 'home') }}">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Pagrinidinis puslapis</span>
                </a>
            </li>
            @auth('teacher')
                @if (Auth::guard('teacher')->user()->is_admin)
                <li>
                    <a href="{{ route($userType . 'students.index') }}">
                        <i class='bx bxs-group'></i>
                        <span class="links_name">Studentai</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route($userType . 'teachers.index') }}">
                        <i class='bx bxs-user-detail' ></i>
                        <span class="links_name">Mokytojai</span>
                    </a>
                </li>
                @endif
            @endauth
            @auth('teacher')
                <li>
                    <a href="{{ route($userType . 'classes.index') }}">
                        <i class='bx bxs-school'></i>
                        <span class="links_name">Klasės</span>
                    </a>
                </li>
            @endauth

            <li>
                <a href="{{ route($userType . 'lessons.index') }}">
                    <i class='bx bxs-book-alt'></i>
                    <span class="links_name">Pamokos</span>
                </a>
            </li>
            <li>
                <a href="{{ route($userType . 'comments.index') }}">
                    <i class='bx bx-comment'></i>
                    <span class="links_name">Komentarai</span>
                </a>
            </li>
            @auth('teacher')
                @if (Auth::guard('teacher')->user()->is_admin)
                <li>
                    <a href="{{ route($userType . 'grades') }}">
                        <i class='bx bxs-grid-alt'></i>
                        <span class="links_name">Pažymiai</span>
                    </a>
                </li>
                @endif
            @endauth
            <li>
                <a href="{{ route('profile') }}">
                    <i class='bx bxs-wrench'></i>
                    <span class="links_name">Profilis</span>
                </a>
            </li>
            {{-- <li>
                <a class="logout" href="{{ route('logout') }}">
                    <i class='bx bx-log-out' id="log_out"></i>
                    <span class="links_name">Atsijungti</span>
                </a>
            </li> --}}
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="logout" type="submit">
                        <i class='bx bx-log-out' id="log_out"></i>
                        <span class="links_name">Atsijungti</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <div class="home_content">
        @yield('content')
    </div>
</body>
</html>