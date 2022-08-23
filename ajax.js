$(document).ready(function () {

  //refral notice
  $("#ref").change(function () {
    var ref = $("#ref").val();

    if (ref == "Others") {
      $("#anref").show();
    } else {
      $("#anref").hide();
    }
  });


   //gender change
   $("#catgy").change(function () {
    var gend = $("#catgy").val();

    if (gend == "Female") {
      $("#gdian").show();
    } else {
      $("#gdian").hide();
    }
  });


   //searcg
   $("#src").click(function () {
      $("#srcclck").show();
      $("#src").hide();
  });



  //signup
  $("#sub").click(function () {
    var fname = $("#fname").val();
    var usname = $("#usname").val();
    var catgy = $("#catgy").val();
    var email = $("#email").val();
    var inst = $("#inst").val();
    var abt = $("#abt").val();
    var pword = $("#pword").val();
    var cpword = $("#cpword").val();
    var nref = $("#ref").val();
    var age = $("#age").val();
    var country = $("#country").val();
    var nationality = $("#nationality").val();

    if ($("#terms-conditions").prop('checked')) { 

        if (nref == "Others") {
          var ref = $("#nref").val();
        } else {
          var ref = $("#ref").val();
        }


        if(catgy == 'Female') {

          var tel = $("#tel").val();

        } else {

          var tel = 0;
        }

    if (fname == "" || fname == null) {
      $("#fmsg").html("Kindly input your full name.");
    } else {
      if (usname == "" || usname == null) {
        $("#usmsg").html("Please create a username");
      } else {
        if (email == "" || email == null) {
          $("#emmsg").html("Invalid email address");
        } else {
          if (abt == "" || abt == null) {
            $("#abtmsg").html("Please tells us about yourself");
          } else {
            if (inst == "" || inst == null) {
              $("#instmsg").html("Kindly input your institution name");
            } else {
              if (pword == "" || pword == null) {
                $("#pwmsg").html("Please create a secured password");
              } else {
                if (cpword == "" || cpword == null) {
                  $("#cpwmsg").html("Confirm your password");
                } else {
                  if (pword != cpword) {
                    $("#cpwmsg").html("Password does not match");
                  } else {
                    if(tel == null || tel == '' || tel == 0 && catgy == 'Female') {
                      $("#telmsg").html("Kindly input your guardian contact number");
                    } else {
                      if(age == null || age == '' || age == 0) {
                        $("#agemsg").html("Kindly input your age");
                      } else {
                    $("#msg").html(
                      '<img style="width: 100px; height: 100px" src="img/loading.gif">'
                    );

                    $.ajax({
                      type: "post",
                      url: "functions/init.php",
                      data: {
                        fname: fname,
                        usname: usname,
                        email: email,
                        pword: pword,
                        cpword: cpword,
                        catgy, catgy,
                        ref: ref,
                        abt: abt,
                        inst: inst,
                        tel: tel,
                        age: age,
                        country: country,
                        nationality: nationality
                      },
                      success: function (data) {
                        $("#msg").html(data);
                      },
                    });
                  }
                }
              }
            }
          }
        }
      }
    }
  }
    }
    } else {
      $("#msg").html("Please accept our terms and conditions to continue"); 
    }
  });


  //edit profile
   $("#eddbtn").click(function () {
    var fname = $("#fname").val();
    var email = $("#email").val();
    var inst = $("#inst").val();
    var abt = $("#abt").val();
    var age = $("#age").val();
    var country = $("#country").val();
    var nationality = $("#nationality").val();
    var prayer = $("#prayer").val();
    var marital = $("#marital").val();
    var children = $("#children").val();
    var hijab = $("#hijab").val();
    var height = $("#height").val();
    var beard = $("#beard").val();
    var prof = $("#prof").val();
    var qual = $("#qual").val();
    var idr = $("#idd").val();
    

    if (height == "" || height == null) {

      var heigh = 'Prefer not to say';

    } else {

      var heigh = $("#height").val();

    }

      if (prof == "" || prof == null) {

        var pro = 'Prefer not to say';

      } else {

        var pro = $("#prof").val();

      }

        if (qual == "" || qual == null) {

          var qua = 'Prefer not to say';

        } else {

          var qua = $("#qual").val();
        }
        
    if (fname == "" || fname == null) {
      $("#fmsg").html("Kindly input your full name.");
    } else {
        if (email == "" || email == null) {
          $("#emmsg").html("Invalid email address");
        } else {
          if (abt == "" || abt == null) {
            $("#abtmsg").html("Please tells us about yourself");
          } else {
            if (inst == "" || inst == null) {
              $("#instmsg").html("Kindly input your institution name");
            } else {
                  if(age == null || age == '' || age == 0) {
                    $("#agemsg").html("Kindly input your age");
                  } else {
                    $("#msg").html("Loading... Please wait");

                    $.ajax({
                      type: "post",
                      url: "../functions/init.php",
                      data: {
                        fname: fname,
                        email: email,
                        abt: abt,
                        inst: inst,
                        age: age,
                        country: country,
                        nationality: nationality,
                        prayer: prayer, 
                        marital: marital, 
                        children: children, 
                        hijab: hijab, 
                        heigh: heigh, 
                        pro: pro, 
                        qua: qua, 
                        idr: idr, 
                        beard: beard
                      },
                      success: function (data) {
                        $("#msg").html(data);
                      },
                    });
                  }
                }
              }
            }
          }
  });

  //resend otp
  $("#rotp").click(function () {
    $("#otptitle").html("We've sent you another OTP ✅");

    //I left this code so as to give a dummy text to the function validator
    var otpp = "dummy";

    $("#vmsg").html(
      '<img style="width: 100px; height: 100px" src="img/loading.gif">'
    );

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: { otpp: otpp },
      success: function (data) {
        $("#vmsg").html(data);
      },
    });
  });

  //verify otp
  $("#vsub").click(function () {
    var digit1 = $("#digit-1").val();
    var digit2 = $("#digit-2").val();
    var digit3 = $("#digit-3").val();
    var digit4 = $("#digit-4").val();

    if (digit1 == "" || digit1 == null) {
      $("#vmsg").html("Invalid OTP!");
    } else {
      if (digit2 == "" || digit2 == null) {
        $("#vmsg").html("Invalid OTP!");
      } else {
        if (digit3 == "" || digit3 == null) {
          $("#vmsg").html("Invalid OTP!");
        } else {
          if (digit4 == "" || digit4 == null) {
            $("#vmsg").html("Invalid OTP!");
          } else {
            var votp = digit1 + digit2 + digit3 + digit4;

            $("#vmsg").html(
              '<img style="width: 100px; height: 100px" src="img/loading.gif">'
            );

            $.ajax({
              type: "post",
              url: "functions/init.php",
              data: { votp: votp },
              success: function (data) {
                $("#vmsg").html(data);
              },
            });
          }
        }
      }
    }

    alert(allotp);
    /* var votp   = $("#otpper").val();
   var votp   = $("#otpper").val();
   var votp   = $("#otpper").val();

  document.getElementById("rvmsg").style.display = 'none';
  document.getElementById("vmsg").style.display = 'block';

      if (votp == "" || votp == null) {
      $("#vmsg").html("Invalid OTP!");
    } else {
    $("#vmsg").html("Loading... Please Wait");
    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: {votp: votp},
      success: function (data) {
        $("#vmsg").html(data);
      },
    });
  }*/
  });

  //signin
  $("#lsub").click(function () {
    var username = $("#luname").val();
    var password = $("#lpword").val();

    if (username == "" || username == null) {
      $("#lumsg").html("Kindly insert your username");
    } else {
      if (password == "" || password == null) {
        $("#lupmsg").html("Invalid password inputted");
      } else {
        $("#lmsg").html(
          '<img style="width: 100px; height: 100px" src="img/loading.gif">'
        );
        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: { username: username, password: password },
          success: function (data) {
            $("#lmsg").html(data);
          },
        });
      }
    }
  });

  //forgot
  $("#fsub").click(function () {
    var fgeml = $("#femail").val();

    if (fgeml == "" || fgeml == null) {
      $("#fmsg").html("Please insert your email");
    } else {
      $("#fmsg").html(
        '<img style="width: 100px; height: 100px" src="img/loading.gif">'
      );

      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: { fgeml: fgeml },
        success: function (data) {
          $("#fmsg").html(data);
        },
      });
    }
  });

  //reset
  $("#updf").click(function () {
    var fgpword = $("#pword").val();
    var fgcpword = $("#cpword").val();

    if (fgpword == "" || fgpword == null) {
      $("#umsg").html("Please create a new password");
    } else {
      if (fgcpword == "" || fgcpword == null) {
        $("#umsg").html("Kindly confirm Your Password");
      } else {
        if (fgpword != fgcpword) {
          $("#umsg").html("Password does not match!");
        } else {
          $("#umsg").html(
            '<img style="width: 100px; height: 100px" src="img/loading.gif">'
          );

          $.ajax({
            type: "post",
            url: "functions/init.php",
            data: { fgpword: fgpword, fgcpword: fgcpword },
            success: function (data) {
              $("#umsg").html(data);
            },
          });
        }
      }
    }
  });


   //details
   $("#subbeddnn").click(function () {
    var prayer = $("#prayer").val();
    var marital = $("#marital").val();
    var children = $("#children").val();
    var hijab = $("#hijab").val();
    var height = $("#height").val();
    var beard = $("#beard").val();
    var prof = $("#prof").val();
    var qual = $("#qual").val();
    var idd = $("#idd").val();
    

    if (height == "" || height == null) {

      var heigh = 'Prefer not to say';

    } else {

      var heigh = $("#height").val();

    }

      if (prof == "" || prof == null) {

        var pro = 'Prefer not to say';

      } else {

        var pro = $("#prof").val();

      }

        if (qual == "" || qual == null) {

          var qua = 'Prefer not to say';

        } else {

          var qua = $("#qual").val();
        }

          
          
          $.ajax({
            type: "post",
            url: "../functions/init.php",
            data: {prayer: prayer, marital: marital, children: children, hijab: hijab, heigh: heigh, pro: pro, qua: qua, idd: idd, beard: beard},
            success: function (data) {
              $("#msg").html(data);
            },

          });
  });
});
