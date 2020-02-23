<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Space Calendar</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="#">Space Calendar</a>
            <p id="description" class="navbar-text">A calendar for astronomical events, that can be spotted by eye or telescope.</p>
        </div>
    </div>

    <div class="container topButtons text-center">
        <!-- Split buttons -->
        <div class="btn-group">
          <button type="button" class="btn btn-primary" onclick="filterEvents('Moon','Mercury','Venus','Mars','Jupiter','Uranus','Neptune','Quarter','Lunar');">Planets and Moons</button>
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li onclick="filterEvents('Moon','Quarter','Lunar');"><a href="#">Moon</a></li>
            <li onclick="filterEvents('Mercury');"><a href="#">Mercury</a></li>
            <li onclick="filterEvents('Venus');"><a href="#">Venus</a></li>
            <li onclick="filterEvents('Mars');"><a href="#">Mars</a></li>
            <li onclick="filterEvents('Jupiter');"><a href="#">Jupiter</a></li>
            <li onclick="filterEvents('Uranus');"><a href="#">Uranus</a></li>
            <li onclick="filterEvents('Neptune');"><a href="#">Neptune</a></li>
          </ul>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-danger" onclick="filterEvents('Leonid','Quadrantid','Lyrid','Aquarid','Perseid','Orionid','Taurid','Geminid','Ursid');">Meteor Showers</button>
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li onclick="filterEvents('Leonid');"><a href="#">Leonid</a></li>
            <li onclick="filterEvents('Quadrantid');"><a href="#">Quadrantid</a></li>
            <li onclick="filterEvents('Lyrid');"><a href="#">Lyrid</a></li>
            <li onclick="filterEvents('Aquarid');"><a href="#">Aquarid</a></li>
            <li onclick="filterEvents('Perseid');"><a href="#">Perseid</a></li>
            <li onclick="filterEvents('Orionid');"><a href="#">Orionid</a></li>
            <li onclick="filterEvents('Taurid');"><a href="#">Taurid</a></li>
            <li onclick="filterEvents('Geminid');"><a href="#">Geminid</a></li>
            <li onclick="filterEvents('Ursid');"><a href="#">Ursid</a></li>
          </ul>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-warning" onclick="filterEvents('Perihelion','Aldebaran','Spica','Solar','Pollux','Pleiades','Beehive','Antares');">&nbsp;&nbsp;Sun and Stars&nbsp;&nbsp;</button>
          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li onclick="filterEvents('Perihelion','Solar');"><a href="#">Sun</a></li>
            <li onclick="filterEvents('Aldebaran');"><a href="#">Aldebaran</a></li>
            <li onclick="filterEvents('Spica');"><a href="#">Spica</a></li>
            <li onclick="filterEvents('Pleiades');"><a href="#">Pleiades</a></li>
            <li onclick="filterEvents('Pollux');"><a href="#">Pollux</a></li>
            <li onclick="filterEvents('Beehive');"><a href="#">Beehive</a></li>
            <li onclick="filterEvents('Antares');"><a href="#">Antares</a></li>
          </ul>
        </div>
    </div>
    <div id="dayInfo" class="container alert alert-info" role="alert">
    </div>
    <div id="month"><?php echo date('F')." 2014";?></div>
    <div id="calendar" class="container">
        <div class="row seven-cols">
            <div class="hidden-xs hidden-sm col-md-1">
                    <div class="day">
                        Sunday 
                    </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-1">
                    <div class="day">
                        Monday
                    </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-1">
                    <div class="day">
                        Tuesday
                    </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-1">
                    <div class="day">
                        Wednesday
                    </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-1">
                    <div class="day">
                        Thursday
                    </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-1">
                    <div class="day">
                        Friday
                    </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-1">
                    <div class="day">
                        Saturday
                    </div>
            </div>
        </div>
        <div class="row seven-cols">
            <div class="col-md-1 calDay">
                <div id="a1" class="thumbnail">
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="b1" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="c1" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="d1" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="e1" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="f1" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="g1" class="thumbnail">
                    
                </div>
            </div>
        </div>
        <div class="row seven-cols">
            <div class="col-md-1 calDay">
                <div id="a2" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="b2" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="c2" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="d2" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="e2" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="f2" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="g2" class="thumbnail">
                    
                </div>
            </div>
        </div>
        <div class="row seven-cols">
            <div class="col-md-1 calDay">
                <div id="a3" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="b3" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="c3" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="d3" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="e3" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="f3" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="g3" class="thumbnail">
                    
                </div>
            </div>
        </div>
        <div class="row seven-cols">
            <div class="col-md-1 calDay">
                <div id="a4" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="b4" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="c4" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="d4" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="e4" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="f4" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="g4" class="thumbnail">
                    
                </div>
            </div>
        </div>
        <div class="row seven-cols">
            <div class="col-md-1 calDay">
                <div id="a5" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="b5" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="c5" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="d5" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="e5" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="f5" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="g5" class="thumbnail">
                    
                </div>
            </div>
        </div>
        <div class="row seven-cols">
            <div class="col-md-1 calDay">
                <div id="a6" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="b6" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="c6" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="d6" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="e6" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="f6" class="thumbnail">
                    
                </div>
            </div>
            <div class="col-md-1 calDay">
                <div id="g6" class="thumbnail">
                    
                </div>
            </div>
        </div>
        <ul class="pager" id="prevMonth">
            <li onclick="previousMonth();"><a href="#">Previous Month</a></li>
        </ul>
        <ul class="pager" id="nextMonth">
            <li onclick="nextMonth();"><a href="#">Next Month</a></li>
        </ul>
        <p class="credits">Calendar data: Sky Events Calendar by Fred Espenak and Sumit Dutta (NASA's GSFC)</p>
        <div class="credits">Icons made by <a href="http://www.simpleicon.com" title="SimpleIcon">SimpleIcon</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> are licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0 </a></div> 
    </div>
    <!-- Mandatory for Responsive Bootstrap Toolkit to operate -->
    <div class="device-xs visible-xs"></div>
    <div class="device-sm visible-sm"></div>
    <div class="device-md visible-md"></div>
    <div class="device-lg visible-lg"></div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>

        //Responsive breakpoint functions. Change the layout for optimal viewing based on screen size.
        function isBreakpoint( alias ) {
            return $('.device-' + alias).is(':visible');
        }

        var waitForFinalEvent = function(){var b={};return function(c,d,a){a||(a="I am a banana!");b[a]&&clearTimeout(b[a]);b[a]=setTimeout(c,d)}}();
        var fullDateString = new Date();

        $(window).resize(function () {
            waitForFinalEvent(function(){
                //Set display on extra small or small screens.
                if(isBreakpoint('xs')||isBreakpoint('sm')){ 
                   console.log('xs or sm');
                   $("#dayInfo").css("position","fixed");
                   $("#dayInfo").css("width","90%");
                   $("#dayInfo").css("left","5%");
                   $("#dayInfo").css("top","19.5%");
                    for (i=0; i<tempCalDays.length; i++){
                        if ($("#"+tempCalDays[i]).css("background-color") === "rgb(57, 57, 57)"){ 
                            if (!(tempCalDays[i] === "a1")){
                                $("#"+tempCalDays[i]).closest(".calDay").css("display","none");
                            }else{
                               $("#"+tempCalDays[i]).css("display","none"); 
                                }
                        }
                    }
                }
                if (isBreakpoint('md')){
                    console.log('md');
                }
                if (isBreakpoint('lg')){
                    console.log('lg');
                }
                //Set display on medium or small screens.
                if(isBreakpoint('md')||isBreakpoint('lg')){
                    $("#dayInfo").css("position","relative");
                    $("#dayInfo").css("width",$(".container").width());
                    $("#dayInfo").css("left","0");
                    for (i=0; i<tempCalDays.length; i++){
                        $("#"+tempCalDays[i]).closest(".calDay").css("display","block");
                        $("#"+tempCalDays[i]).css("display","block");
                    }
                }
            }, 300, fullDateString.getTime())
        });

        var currentMonth = $("#month").html().substring(0,3);

        var monthLength = {"Jan":31,"Feb":28,"Mar":31,"Apr":30,"May":31,"Jun":30,"Jul":31,"Aug":31,"Sep":30,"Oct":31,"Nov":30,"Dec":31};

        var monthNames = [ "January", "Febuary", "March", "April", "May", "June",
               "July", "August", "September", "October", "November", "December" ];

        var currentDayInfo;
        var currentDayCoor;
        var tempCalDays = [];

        function setDayData(day, icon, monthLength, month, calDays, startDays, tempCalDays){
            //Set dates on calendar.
            var xCoor = ["a","b","c","d","e","f","g"];
            var yCoor = ["1","2","3","4","5","6"];
            for (y in yCoor){
                for (x in xCoor){
                    calDays.push(xCoor[x]+yCoor[y]);
                    tempCalDays.push(xCoor[x]+yCoor[y]);
                }
            }
            var calStartDay = calDays.indexOf(startDays[month]);
            var curDay = calStartDay;
            var currentMonthLength = monthLength[month];
            
            //Set day, time, event, and icon for each day.
            for (i=1; i<currentMonthLength+1; i++){
                //Check if element is empty, if so, add the day number.
                if (!$.trim($("#"+calDays[curDay]).html())){
                    console.log("white");
                    $("#"+calDays[curDay]).css("background-color","white");
                    $("#"+calDays[curDay]).html(i);
                } 
                if (parseInt(day) === i){
                    if (!((($("#"+calDays[curDay]).html()).indexOf(icon)) > -1)){
                        $("#"+calDays[curDay]).html($("#"+calDays[curDay]).html()+" <img src='images/"+icon+".png'>");
                    }
                }
                curDay++;
            }
        }

        //Show the previous month's calendar.
        function previousMonth(){
            currentMonth = $("#month").html().replace("<h1>","").replace("</h1>","").replace(" 2014","");
            var currentMonthIndex = monthNames.indexOf(currentMonth);
            if ((monthNames[currentMonthIndex-1]) !== undefined){
                var previousMonth = monthNames[currentMonthIndex-1]; 
            }else{
                var previousMonth = monthNames[11];
            }
            $("#month").html(previousMonth+" 2014");
            currentMonth = previousMonth.substring(0,3);
            $(".thumbnail").each(function(){
                $(this).html("");
            });
            getAstroData();
        } 
        
        //Show the next month's calendar.
        function nextMonth(){
            currentMonth = $("#month").html().replace("<h1>","").replace("</h1>","").replace(" 2014","");
            var currentMonthIndex = monthNames.indexOf(currentMonth);
            if ((monthNames[currentMonthIndex+1]) !== undefined){
                var nextMonth = monthNames[currentMonthIndex+1]; 
            }else{
                var nextMonth = monthNames[0];
            }
            $("#month").html(nextMonth+" 2014");
            currentMonth = nextMonth.substring(0,3);
            $(".thumbnail").each(function(){
                $(this).html("");
            });
            getAstroData();
        } 

        //Show data for day when clicked.
        function setDayClick(calDays){
            $(".thumbnail").click(function(){
                $(".thumbnail").css("border", "1px solid #DDD");
                $(this).css("border", "2px solid black");
                var calStartDayIndex = calDays.indexOf(startDays[currentMonth]);
                currentDayCoor = this.id;
                var dayCoorIndex = calDays.indexOf(currentDayCoor);
                var currentDayIndex = dayCoorIndex - calStartDayIndex + 1; 
                currentDayInfo = calData[currentDayIndex];
                $("#dayInfo").html("");
                $("#dayInfo").hide();
                if (currentDayInfo){
                    $("#dayInfo").html(currentDayInfo);
                    $("#dayInfo").show();
                }
            });
        }

        var startDays = {"Jan":"d1","Feb":"g1","Mar":"g1","Apr":"c1",
                            "May":"e1","Jun":"a1","Jul":"c1","Aug":"f1","Sep":"b1",
                            "Oct":"d1","Nov":"g1","Dec":"b1"};
        var calData = {};

        //Show info for current selected day when switching days.
        
        function showCurrentSelectedInfo(calDays){
            var dayCoorIndex = calDays.indexOf(currentDayCoor);
            var calStartDayIndex = calDays.indexOf(startDays[currentMonth]);
            var currentDayIndex = dayCoorIndex - calStartDayIndex + 1; 
            currentDayInfo = calData[currentDayIndex];
            if (currentDayInfo){
                $("#dayInfo").html(currentDayInfo);
                $("#dayInfo").show();
            }
        }

        //Main function to get data for calendar.
        function getAstroData(tempCalDays, filteredEvents){
            console.log(filteredEvents);
            //Set background color for unused calendar squares.
            $(".thumbnail").css("background-color","#393939");
            //Reset html when switching calendar sets.
            $(".thumbnail").html("");
            $("#dayInfo").html("");
            $("#dayInfo").hide();
            calData = {};
            filteredEvents = filteredEvents === undefined ? [] : filteredEvents;
            tempCalDays = tempCalDays === undefined ? [] : tempCalDays;
            //Get astronomy data with AJAX.
            $.get("parsedata.php").done(function(data){
                var jsonObj = $.parseJSON(data);
                var jsonLength = jsonObj.length;
                var calDays = [];
                var events = false;
                for(var i=0; i<jsonLength; i++){
                    var dayData = jsonObj[i][currentMonth]; 
                    if (dayData !== undefined){
                        var day = (typeof dayData[0] === 'string') ? dayData[0].trim() : dayData[0];
                        var time = dayData[1];
                        var dayEvent = dayData[2];
                        var icon = dayData[3][0];
                        var showEvent = true;
                        console.log(filteredEvents.length);
                        if (filteredEvents.length > 0){
                            showEvent = false;
                            for(n=0; n<filteredEvents.length; n++){
                                console.log(dayEvent);
                                console.log(filteredEvents[n]);
                                if (dayEvent.indexOf(filteredEvents[n]) > -1){
                                    console.log("has");
                                    showEvent = true;
                                    events = true;
                                }
                            }
                        }
                        if (showEvent){
                            events = true;
                            //Replace non-ascii characters with an empty string.
                            dayEvent = dayEvent.replace(/./g, function(char){
                                return char.charCodeAt(0) === 194 ? "" : char; 
                            }); 
                            if (calData[day] !== undefined){
                                calData[day] = calData[day]+"<br/>"+dayEvent;
                            }else{
                                calData[day] = dayEvent;
                            }
                            setDayData(day, icon, monthLength, currentMonth, calDays, startDays, tempCalDays);
                        }
                    }
                }
                    //If there are no events for the month for the filtered result, show an alert.
                if (!events){
                    $("#dayInfo").html("There are no events this month for the chosen categories.");
                    $("#dayInfo").show();
                }
                setDayClick(calDays);
                showCurrentSelectedInfo(calDays);
            });
            //Make month and day headings larger.
            $("#month").html("<h1>"+$('#month').html()+"</h1>");
        }
        
        //Starting function for page.
        getAstroData(tempCalDays, []);

        //Make month headings larger. 
        $(".day").each(function(i){
            $(this).html("<h4>"+$(this).html()+"</h4>");
        });

        //This is called if a category is selected.
        function filterEvents(){
            console.log("fil"+arguments);
            getAstroData([], arguments);
        }
 
    </script>
</body>
</html>


