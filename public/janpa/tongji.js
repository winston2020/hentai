document.writeln("<div style=\'display:none;\'>");
document.writeln('<script src="https://s22.cnzz.com/z_stat.php?id=1273793447&web_id=1273793447" language="JavaScript"></script>');
document.writeln("</div>");

function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}
function setCookieWithTime(name, value, exp_time) {
    var exp = new Date();
    exp.setTime(exp.getTime() + exp_time);
    document.cookie = name + "= " + escape(value) + ";expires= " + exp.toGMTString()+";path=/";
}

//记录点击数
function recordedclick(bid)
{
    if(check_bid_by_cookie(bid)){
        return ;
    }
    $.ajax({
        cache:false,
        url:'/bookclick/'+bid+'.php'
    });
    set_bid_in_cookie(bid);
}

function check_bid_by_cookie(bid){
    var clickbids = getCookie('clickbids');
    if(null == clickbids){
        return false;
    }
    var arr_bid = clickbids.split(',');
    for (var i = arr_bid.length - 1; i >= 0; i--) {
        if( parseInt(bid) == parseInt(arr_bid[i])){
            return true;
        }
    }
    return false;
}

function set_bid_in_cookie(bid){
    var clickbids = getCookie('clickbids');
    if(null == clickbids){
        clickbids = bid;
    }else{
        clickbids = clickbids + "," +bid;
    }
    var now_date = new Date();
    var tonight_date = new Date();
    tonight_date.setHours(23);
    var now_time = now_date.getTime();
    var tonight_time = tonight_date.getTime();
    var gap_time = tonight_time - now_time;
    setCookieWithTime('clickbids', clickbids, gap_time);
}
