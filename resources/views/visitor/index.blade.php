@extends('layouts.visitor.app')

@section('content')
    			<!-- One -->
                <section id="one" class="wrapper style1 special">
                    <div class="inner">
                        <header class="major">
                            <h2>Located In Soche, Blantyre, Malawi<br />
                           </h2>
                            <p>Nkolokosa</p>
                        </header>
                        <ul class="icons major">
                            <li><span class="icon solid fa-praying-hands major style1"><span class="label">Lorem</span></span></li>
                            <li><span class="icon fa-heart major style2"><span class="label">Ipsum</span></span></li>
                            <li><span class="icon solid fa-cross major style3"><span class="label">Dolor</span></span></li>
                        </ul>
                    </div>
                </section>

            <!-- Two -->
                <section id="two" class="wrapper alt style2">
                    <section class="spotlight">
                        <div class="image"><img src="{{asset('visitor/images/pic06 (1).jpg')}}" alt="" /></div><div class="content">
                            <h2>Mass Service</h2>
                            <p>EVERY WEEK From Monday to saturday there are chichewa morning masses from 6am</p>
                            <p>From Saturday starting from 5pm there is also a chichewa mass which is the same as a sunday mass<p>
                            <p>On Sunday first mass which is chichewa starts at 4:45am then followed by a 6:30am chichewa mass then followed by English Mass at 8:30am and the final mass starts at 10am which is a chichewa mass too.  
                        </div>
                    </section>
                    <section class="spotlight">
                        <div class="image"><img src="{{asset('visitor/images/pic06 (5).jpg')}}" alt="" /></div><div class="content">
                            <h2>VISITORS</h2>
                            <p>The Vice President of Malawi . Dr Saulos Chilima</p>
                        </div>
                    </section>
                    <section class="spotlight">
                        <div class="image"><img src="{{asset('visitor/images/pic06 (2).jpg')}}" alt="" /></div><div class="content">
                            <h2> Activities and Groups </h2>
                            <p>Choirs </br> Groups </br> leadership Stuff</p>
                        </div>
                    </section>
                </section>

            
            <!-- CTA -->
                <section id="cta" class="wrapper style4">
                    <div class="inner">
                        <header>
                            <h2>You can also be a member</h2>
                            <p>Register or Login to access your account</p>
                        </header>
                        <ul class="actions stacked">
                            <li><a href="{{route('register')}}" class="button fit primary">Register</a></li>
                            <li><a href="{{route('login')}}" class="button fit">Sign In</a></li>
                        </ul>
                    </div>
                </section>

@endsection