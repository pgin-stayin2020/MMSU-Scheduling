


<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        
        
        @yield('plugin_css')
        <link rel="stylesheet" href="/css/main.css">
        
        <!-- Styles -->

    </head>
    <body>
		{{ csrf_field() }}
        
		<div id="print">
		</div>
            
        <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script>
			$(document).ready(function(){
                room = '{{ $request->room }}';
                faculty = '{{ $request->faculty }}';
                id = '{{ $request->id }}';
                cy = '{{ $request->cy }}';
                sem = '{{ $request->sem }}';
                year = '{{ $request->year }}';
				bldg = '{{ $request->bldg }}';
                roomType = '{{ $request->roomType }}';
                type = '{{ $request->type }}';
                section = '{{ $request->section }}';
                curricula_id = '{{ $request->curricula_id }}';
                if (room != "") {
                    if(type == 'normal'){
                        $("#print").load("/schedule/displayRoomSchedule",{'_token' : $("[name=_token]").val(), 'room' : room , 'sem' : sem, 'cy' : cy, 'roomType' : roomType, 'bldg' : bldg}, function(){
                            window.print();
                        });
                    }else if(type == 'table'){
                        $("#print").load("/schedule/displayRoomScheduleTable", {'_token' : $("[name=_token]").val(), 'room' : room , 'sem' : sem, 'cy' : cy, 'roomType' : roomType, 'bldg' : bldg}, function(){
                            fill_table_room();
                        });
                    }
                }else if(faculty != "") {
                    if(type == 'normal'){
                        $("#print").load("/schedule/displayFacultySchedule",{ '_token' : $("[name=_token]").val(), 'emp_id' : faculty, 'sem' : sem, 'cy' : cy}, function(){
                            window.print();
                        });
                    }else if (type == 'table'){
                        $("#print").load("/schedule/displayFacultyScheduleTable",{ '_token' : $("[name=_token]").val(), 'emp_id' : faculty, 'sem' : sem, 'cy' : cy}, function(){
                            fill_table_faculty();
                        });
                    }
                }else if(section != ""){
                    if(type == 'normal'){
                        $("#print").load("/schedule/displaySectionSchedule", { '_token' : $("[name=_token]").val(), 'cy' : cy, 'year' : year, 'sem' : sem, 'curricula_id' : curricula_id }, function(){
                            window.print();
                        });
                    }else if(type == 'table'){
                        $("#print").load("/schedule/displaySectionScheduleTable", { '_token' : $("[name=_token]").val(), 'cy' : cy, 'year' : year, 'sem' : sem, 'curricula_id' : curricula_id }, function(){
                            fill_table_section();
                        });
                    }
                }else if(id != ""){
                    if(type == 'normal'){
                        $("#print").load("/schedule/displaySchedule",{ '_token' : $("[name=_token]").val(), 'schedule_id' : id}, function(){
                            window.print();
                        });
                    }else if(type == 'table'){
                        $("#print").load("/schedule/displayScheduleTable", { '_token' : $("[name=_token]").val(), 'schedule_id' : id}, function(){
                            fill_table_1b1(id)
                        });
                    }
                }
			});

            function fill_table_1b1(id){
                $.post('/schedule/fillTable', { '_token' : $("[name=_token]").val(), 'schedule_id' : id, 'type' : '1b1'}, function(result){
                    $.each(JSON.parse(result), function(i,valI){
                        $.each(valI, function(j,valJ){
                            console.log(valJ);
                            $.each(valJ.day, function(d,vald){
                                rowspan = Math.abs(parseInt(valJ.fr_id) - parseInt(valJ.to_id));
                                $("."+valJ.schedule_id +" ."+valJ.fr_id+"-"+vald).attr("rowspan", rowspan);
                                $("."+valJ.schedule_id +" ."+valJ.fr_id+"-"+vald).html(function(){
                                    html = "";
                                    var faculty = "";
                                    if(valJ.faculty != null){
                                        faculty = valJ.faculty.firstname+" "+valJ.faculty.surname
                                    }else{
                                        faculty = "TBA";
                                    }
                                    html += "<p><b>"+valJ.course.code+"</b></p>"+
                                            "<p>"+valJ.bldg.bldg+"</p>"+
                                            "<p>"+valJ.room.number+"</p>"+
                                            "<p>"+faculty+"</p>";
                                    return html;
                                });
                                for (var i = valJ.fr_id+1; i < valJ.fr_id+rowspan; i++) {
                                        console.log(vald);
                                        console.log(i);
                                    
                                    $("."+valJ.schedule_id +" [class='"+i+"-"+vald+"']").remove();
                                }
                            })
                        })
                    })
                    window.print();
                })
            }

            function fill_table_room(){
                $.post('/schedule/fillTable', {'_token' : $("[name=_token]").val(), 'room' : room , 'sem' : sem, 'cy' : cy, 'roomType' : roomType, 'bldg' : bldg, 'type' : 'room'}, function(result){
                    $.each(JSON.parse(result), function(i,valI){
                        $.each(valI, function(j,valJ){
                            console.log(valJ);
                            $.each(valJ.day, function(d,vald){
                                rowspan = Math.abs(parseInt(valJ.fr_id) - parseInt(valJ.to_id));
                                $("."+valJ.room_id +" ."+valJ.fr_id+"-"+vald).attr("rowspan", rowspan);
                                $("."+valJ.room_id +" ."+valJ.fr_id+"-"+vald).html(function(){
                                    html = "";
                                    faculty = valJ.faculty.firstname+" "+valJ.faculty.surname
                                    
                                    html += "<p><b>"+valJ.course.code+"</b></p>"+
                                            "<p>"+valJ.bldg.bldg+"</p>"+
                                            "<p>"+valJ.room.number+"</p>"+
                                            "<p>"+faculty+"</p>";
                                    return html;
                                });
                                for (var i = valJ.fr_id+1; i < valJ.fr_id+rowspan; i++) {
                                        console.log(vald);
                                        console.log(i);
                                    
                                    $("."+valJ.room_id +" [class='"+i+"-"+vald+"']").remove();
                                }
                            })
                        })
                    })
                    window.print();
                })
            }

            function fill_table_faculty(){
                $.post('/schedule/fillTable', { '_token' : $("[name=_token]").val(), 'emp_id' : faculty, 'sem' : sem, 'cy' : cy, 'type': 'faculty'}, function(result){
                    $.each(JSON.parse(result), function(i,valI){
                        $.each(valI, function(j,valJ){
                            console.log(valJ);
                            $.each(valJ.day, function(d,vald){
                                rowspan = Math.abs(parseInt(valJ.fr_id) - parseInt(valJ.to_id));
                                $("."+valJ.emp_id +" ."+valJ.fr_id+"-"+vald).attr("rowspan", rowspan);
                                $("."+valJ.emp_id +" ."+valJ.fr_id+"-"+vald).html(function(){
                                    html = "";
                                    var faculty = "";
                                    if(valJ.faculty != null){
                                        faculty = valJ.faculty.firstname+" "+valJ.faculty.surname
                                    }else{
                                        faculty = "TBA";
                                    }
                                    html += "<p><b>"+valJ.course.code+"</b></p>"+
                                            "<p>"+valJ.bldg.bldg+"</p>"+
                                            "<p>"+valJ.room.number+"</p>"+
                                            "<p>"+faculty+"</p>";
                                    return html;
                                });
                                for (var i = valJ.fr_id+1; i < valJ.fr_id+rowspan; i++) {
                                        console.log(vald);
                                        console.log(i);
                                    
                                    $("."+valJ.emp_id +" [class='"+i+"-"+vald+"']").remove();
                                }
                            })
                        })
                    })
                    window.print();
                })
            }

            function fill_table_section(){
                $.post('/schedule/fillTable', { '_token' : $("[name=_token]").val(), 'cy' : cy, 'year' : year, 'sem' : sem, 'curricula_id' : curricula_id, 'type' : 'section' }, function(result){
                    $.each(JSON.parse(result), function(i,valI){
                        $.each(valI, function(j,valJ){
                            console.log(valJ);
                            $.each(valJ.day, function(d,vald){
                                rowspan = Math.abs(parseInt(valJ.fr_id) - parseInt(valJ.to_id));
                                $("."+valJ.schedule_id +" ."+valJ.fr_id+"-"+vald).attr("rowspan", rowspan);
                                $("."+valJ.schedule_id +" ."+valJ.fr_id+"-"+vald).html(function(){
                                    html = "";
                                    var faculty = "";
                                    if(valJ.faculty != null){
                                        faculty = valJ.faculty.firstname+" "+valJ.faculty.surname
                                    }else{
                                        faculty = "TBA";
                                    }
                                    html += "<p><b>"+valJ.course.code+"</b></p>"+
                                            "<p>"+valJ.bldg.bldg+"</p>"+
                                            "<p>"+valJ.room.number+"</p>"+
                                            "<p>"+faculty+"</p>";
                                    return html;
                                });
                                for (var i = valJ.fr_id+1; i < valJ.fr_id+rowspan; i++) {
                                        console.log(vald);
                                        console.log(i);
                                    
                                    $("."+valJ.schedule_id +" [class='"+i+"-"+vald+"']").remove();
                                }
                            })
                        })
                    })
                    window.print();
                })
            }
		</script>

    </body>
</html>
