<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Siam Knowledge | Admin</title>

    <link rel="stylesheet" href="/assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600&amp;subset=thai" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

  </head>
  <body>

    <!-- Static -->
    <nav>
      <span class="nav-logo">
        <img src="/siam-knowledge-logo_dark.svg" class="logo" />
      </span>
      <span class="nav-text">
        <h2>I AM</h2>
        <h3>{{$data['user']->name}}</h3>
        <h4>Admin <a href=""><span class="logout"><span class="ion-log-out"></span> Logout</span></a></h4>
      </span>
    </nav>
    <!-- end static -->

    <!-- start block -->
    <section class="block">
      <div class="tutorial">
        <h1 class="tutorial-header"><span class="tutorial-icon ion-person"></span> ข้อมูลผู้ใช้งาน</h1>
        <p class="tutorial-info">ค้นหาข้อมูลผู้ใช้งาน แก้ไขสถานะต่าง ๆ เพิ่มหรือลบผู้ใช้งาน</p>
      </div>
      <div class="window">
        <div class="profile-list tutor">
          <h2>Tutor</h2>
          <div class="list">
          <div class="search-wrapper"><span class="ion-ios-search"></span><input id='tutorsearch' class="search" placeholder="ค้นหา" type="text"></input>
          </div>
          <div class="scroll-list">

            <!--- start loop -->

            <div class='tutorresult'>
              
              @foreach($data['tutorprofiles'] as $tutorprofile)
             <div class="profile-item">
              <span class="profile-picture" style="background-image: url('@if($tutorprofile->avatar!=NULL) {{Storage::url($tutorprofile->avatar)}}@else https://api.adorable.io/avatars/100/{{$tutorprofile->email}} @endif');background-size: cover;background-position: center;background-repeat: no-repeat;"></span>
              <span class="profile-text">
              <h2>{{$tutorprofile->name}}</h2>
              <h3>{{$tutorprofile->school}}</h3>
              </span>
            </div>
            @endforeach

            </div>

          <!--- end loop -->

          </div>
          </div>
        </div>
        <div class="profile-list student">
          <h2>Student</h2>
          <div class="list">
          <div class="search-wrapper"><span class="ion-ios-search"></span><input id='studentsearch' class="search" placeholder="ค้นหา" type="text"></input>
          </div>
          <div class="scroll-list">

           <div class='studentresult'>
            @foreach($data['studentprofiles'] as $studentprofile)
             <div class="profile-item">
              <span class="profile-picture" style="background-image: url('@if($studentprofile->avatar!=NULL) {{Storage::url($studentprofile->avatar)}}@else https://api.adorable.io/avatars/100/{{$studentprofile->email}} @endif');background-size: cover;background-position: center;background-repeat: no-repeat;"></span>
              <span class="profile-text">
              <h2>{{$studentprofile->name}}</h2>
              <h3>{{$studentprofile->school}}</h3>
              </span>
            </div>
            @endforeach

           </div>
          </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end block -->

    <!--  start block -->
    <section class="block">
      <div class="tutorial">
        <h1 class="tutorial-header"><span class="tutorial-icon ion-card"></span> เครดิต</h1>
        <p class="tutorial-info">เพิ่มเครดิตจากคำขอของผู้ใช้งาน โดยอนุมัติจากการแจ้งยอดโอน</p>
      </div>
      <div class="window">
        <div class="full-width-window">
        @foreach($data['creditlog'] as $log)
          <!--- start loop -->
          <div class="credit-request">
            <span  class="name-info">
              <h3>{{$log->User->profile->name}}</h3>
              <h4>{{$log->User->profile->school}}</h4>
            </span>
            <span  class="bank-info">
              <h3>{{$log->bank}}</h3>
              <h4>{{$log->time}}</h4>
            </span>
            <span  class="amount-info">
              <h3>{{$log->amount}}<span class="unit">บาท</span></h3>
            </span>
            <span  class="action-info">
              <button href="{{route('approvecredit', ['id'=>$log->id])}}" class="confirm-button">ยืนยัน</button>
              <button class="delete-button">ลบ</button>
            </span>
          </div>
          @endforeach
          <!--- end loop -->

        </div>
    </section>
    <!-- end block -->



  </body>
 <script src="/assets/js/jquery-3.1.1.js" type="text/javascript"></script>


 <script type="text/javascript">
    $('#tutorsearch').keyup(function(){
      var search = $('#tutorsearch').val();
      $.ajax({
      url: "/admin/search/" + search,
      success: function (data) { $('.tutorresult').html(data); },
      dataType: 'html'
      });
    });

  $('#studentsearch').keyup(function(){
      var search = $('#studentsearch').val();
      $.ajax({
      url: "/admin/search/" + search,
      success: function (data) { $('.studentresult').html(data); },
      dataType: 'html'
      });
    });


 </script>

</html>