
function checksdt(e)
{
var unicode=e.keyCode;
if(unicode!=8)
{
if(unicode<48 || unicode>57)
{
return false;
}
}
}
function chechcmnd(e)
{
var unicode=e.keyCode;
if(unicode!=8)
{
if((unicode<48 || unicode>57) && (frmdk.cmnd.value.length != 9))
{
return false;
}
}
}
function chechtk(e)
{
var unicode=e.keyCode;
if(unicode!=8)
{
if(unicode<48 || unicode>57 && unicode<65 || unicode>90 &&  unicode<97 || unicode>122  )
{
return false;
}
}
}
function sm()
{
var span = document.createElement('span');
if(frmdk.ten.value=="")
{
alert("Chưa Nhập tên")
frmdk.ten.focus();
return false;
}
if(frmdk.tk.value=="")
{
alert("Chưa Nhập tài Khoản")
frmdk.tk.focus();
return false;
}
if(frmdk.mk.value=="")
{
alert("Chưa Nhập ")
frmdk.mk.focus();
return false;
}
if(frmdk.xmk.value=="")
{
alert("Chưa Nhập ")
frmdk.xmk.focus();
return false;
}
if(frmdk.mk.value!=frmdk.xmk.value)
{
alert("nhập lại mật khẩu không giống")
frmdk.mk.focus();
return false;
}
if(frmdk.cmnd.value.length!=9)
{
alert("Cmnd Chưa Đúng dạng")
frmdk.cmnd.focus();
return false;
}
if(frmdk.dchi.value=="")
{
alert("Chưa Nhập ")
frmdk.dchi.focus();
return false;
}
if(frmdk.sdt.value=="")
{

alert("Chưa Nhập ")
frmdk.sdt.focus();
return false;
}

       var email=frmdk.email.value;
        var aCong=email.indexOf("@");
        var dauCham = email.lastIndexOf(".");
        if (email == "") {
            alert("Email không dc bỏ tróng");
            return false;
        }
        else if ((aCong<1) || (dauCham<aCong+2) || (dauCham+2>email.length)) {
              alert("Email bạn điền không chính xác");
              return false;
          }

return true;
}
function checkcach(str){
    var pattern=/(.*)\s(.*)/;
    if (pattern.test(str.value)){
        alert("Tên Tài Khoản Có dấu Cách");
		str.focus();
        return false;
    }
    return true;
}
