<!DOCTYPE html>
<html ng-app="TimerApp">
    <head>
        <title>My smart Alarm</title>

        <!-- Fonts -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

       
        <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    
        
      
    </head>
    <body  style="background-image: url(/assets/img/night.png);text-align:center!important">
        <style>
            body {
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;

            }
        </style>
    
    <main id="clockDisplay" class="clock-display">
        <div class="date-field">
            <div class="day-of-week">
                <p class="day-alpha"></p>
                <p class="placeholder">mmmmmmmmm</p>
                <p class="placeholder">ooooooooo</p>
                <p class="placeholder">nnnnnnnnn</p>
                <p class="placeholder">ttttttttt</p>
                <p class="placeholder">uuuuuuuuu</p>
                <p class="placeholder">eeeeeeeee</p>
                <p class="placeholder">sssssssss</p>
                <p class="placeholder">wwwwwwwww</p>
                <p class="placeholder">hhhhhhhhh</p>
                <p class="placeholder">rrrrrrrrr</p>
                <p class="placeholder">fffffffff</p>
                <p class="placeholder">iiiiiiiii</p>
                <p class="placeholder">ddddddddd</p>
                <p class="placeholder">aaaaaaaaa</p>
                <p class="placeholder">yyyyyyyyy</p>
            </div>
            <div class="day-of-week-mobile">
                <p class="day-alpha-mobile"></p>
                <p class="placeholder">mmm</p>
                <p class="placeholder">ooo</p>
                <p class="placeholder">nnn</p>
                <p class="placeholder">ttt</p>
                <p class="placeholder">uuu</p>
                <p class="placeholder">eee</p>
                <p class="placeholder">sss</p>
                <p class="placeholder">www</p>
                <p class="placeholder">hhh</p>
                <p class="placeholder">rrr</p>
                <p class="placeholder">fff</p>
                <p class="placeholder">iii</p>
            </div>
            <div class="month">
                <p class="month-alpha"></p>
                <p class="placeholder">mmm</p>
                <p class="placeholder">ooo</p>
                <p class="placeholder">nnn</p>
                <p class="placeholder">ttt</p>
                <p class="placeholder">uuu</p>
                <p class="placeholder">eee</p>
                <p class="placeholder">sss</p>
                <p class="placeholder">www</p>
                <p class="placeholder">hhh</p>
                <p class="placeholder">rrr</p>
                <p class="placeholder">fff</p>
                <p class="placeholder">iii</p>
                <p class="placeholder">ddd</p>
                <p class="placeholder">aaa</p>
                <p class="placeholder">yyy</p>
                <p class="type">month</p>
            </div>
            <div class="date">
                <p class="date-number"></p>
                <p class="placeholder">88</p>
                <p class="type">day</p>
            </div>
            <div class="year">
                <p class="year-number"></p>
                <p class="placeholder">8888</p>
                <p class="type">year</p>
            </div>
        </div>
        <div class="clock-field">
            <div class="numbers">
                <p class="hours"></p>
                <p class="placeholder">88</p>
                <p class="type">hour</p>
            </div>
            <div class="colon">
                <p>:</p>
            </div>
            <div class="numbers">
                <p class="minutes"></p>
                <p class="placeholder">88</p>
                <p class="type">minute</p>
            </div>
            <div class="colon">
                <p>:</p>
            </div>
            <div class="numbers">
                <p class="seconds"></p>
                <p class="placeholder">88</p>
                <p class="type">second</p>
            </div>
            <div class="am-pm">
                <div>
                    <p class="am">am</p>
                </div>
                <div>
                    <p class="pm">pm</p>
                </div>
            </div>
        </div>
        <div class="bottomAlarm">
            <p onclick="OpenWindow()" class="p1">
                Set Alarm
            </p>
        </div>
        <article>
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <canvas id="myChart"></canvas>
                    <div class="text">Motions Chart</div>
                </div>
                <div class="mySlides fade">
                    <canvas id="myChart2"></canvas>
                    <div class="text">Temperature Chart</div>
                </div>
                <div class="mySlides fade">
                    <canvas id="doughnutChart"></canvas>
                    <div class="text">Sleep Cycle chart</div>
                </div>



                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>


        </article>
    </main>


        <section>
            <div ng-controller="alarmAppController">

                <b id="title" class="title"> Set your time </b>

                <p id="timeDisplay" ng-attr-id="timeDisplay" class="timeDisplay">
                    <strong> @{{displayHours}} : @{{displayMinutes}} </strong>
                </p>

                <div class="TimeStyle">
                    <button ng-click="incrHours()" class="setter">+</button>
                    <button ng-click="decrHours()" class="setter">-</button>
                    <p class="p2">:</p>
                    <button ng-click="incrMinutes()" class="setter">+</button>
                    <button ng-click="decrMinutes()" class="setter">-</button>
                </div>

                <div class="controllButtons">
                    <button id="setTime" ng-click="setAlarm()">Set time</button>
                    <button ng-click="stopAlarm()">Stop</button>
                    <button ng-click="cancelAlarm()"> Cancel </button>
                    <button ng-click="setSnooze()"> Snooze </button>
                </div>

                <p id="alarmMessage" class="wakeUp"> Wake Up !</p>
                <p id="alarmSet"> Alarm is not set</p>


                <button id="modifySnooze" class="snoozeSetter"> Set Snooze </button>

                <div id="snoozeForm" class="changeSnooze">

                    <div style="vertical-align: middle;">
                        <input type="number" id="newSnooze" ng-value="snoozeTime" min="1" max="20" style="
                            width : 60px;
                            height: 20px;">
                    </div>
                    <p class="closeS" id="closeBtn">
                        X
                    </p>
                    <button id="snoozeModified"> Set </button>
                </div>

            </div>

        </section>
        </div>
        <!-- Angular JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.js" integrity="sha512-klc+qN5PPscoGxSzFpetVsCr9sryi2e2vHwZKq43FdFyhSAa7vAqog/Ifl8tzg/8mBZiG2MAKhyjH5oPJp65EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        <script src="{{ asset('assets/js/jquery-3.2.1.js')}}"></script>
        <script src="{{ asset('assets/js/Timer.js')}}"></script>
        <script src="{{ asset('assets/js/clock.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('assets/js/chart.js')}}"></script>
        <script>
            $(document).ready(function(){
                const labels = [
                    @foreach($data as $d)
                    '{{$d->date}} {{$d->time }}',
                    @endforeach
                ];
                motion=[];
                @foreach($data as $d)
                    motion.push({{$d->motion}});
                
                @endforeach

              

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Motions',
                        backgroundColor: '#9FB4FF',
                        borderColor: 'white',
                        data: motion,
                    },
                    
                    ]
                };

                const config = {
                    type: 'line',
                    data: data,
                    options: {}
                };

                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );


                const labels2 = [
                    @foreach($data as $d)
                    '{{$d->date}} {{$d->time }}',
                    @endforeach
                ];
                

                tem=[];
                @foreach($data as $d)
                    tem.push({{$d->temperature}});
                
                @endforeach

                const data2 = {
                    labels: labels2,
                    datasets: [
                    {
                        label: 'Tempratures',
                        backgroundColor: '#FFF56D',
                        borderColor: 'white',
                        data: tem,
                    },
                    
                    ]
                };

                const config2 = {
                    type: 'line',
                    data: data2,
                    options: {}
                };

                const myChart2 = new Chart(
                    document.getElementById('myChart2'),
                    config2
                );
                var i=1,j=1,k=1,time11,time22,time33,time1=0,time2=0,time3=0,motiont=0;

                @foreach($data as $d)
                    @if($d->night ==1)
                        @if(in_array($d->time,['22:00','23:00','00:00'] ))
                            i=i+1;

                            time1=time1+ {{ (int)$d->motion}}

                        @elseif(in_array($d->time,['01:00','02:00','03:00'] ))
                                j=j+1;

                                time2=time2+ {{ (int)$d->motion}}
                        @elseif(in_array($d->time,['04:00','05:00','06:00'] ))
                                k=k+1;

                                time3=time3+ {{ (int)$d->motion}}
                                @endif
                                motiont=motiont+{{ (int)$d->motion}}
                                @endif

                @endforeach
                time11=(time1/100)*motiont

                time22=(time2/100)*motiont

                time33=(time3/100)*motiont

            var ctx = document.getElementById("doughnutChart");
            var doughnutChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['22h->00h', '01h->03h', '03h->05h'],
                    datasets: [{
                        label: '# of Tomatoes',
                        data: [time11, time22, time33],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    //cutoutPercentage: 40,
                    responsive: false,

                }
            });
            })

            </script>
        <script src="{{ asset('assets/js/main.js')}}"></script>
        
    </body>
</html>
