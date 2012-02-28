function heb2civ (inday, inmonth, inyear) {
var max = 0;
var min = 12;
var year = inyear - 3760;
var Date = civ2heb(31,12,year - 1);
var newyear = 0;
if (inmonth >= 7 && inmonth == Date[2] + 1 && inday <= Date[1]) {
  year--;
  newyear = 0;
} else if (inmonth >= 7 && inmonth == Date[2] + 1 && inday > Date[1]) {
  newyear = 1;
} else if (inmonth >= 7 && inmonth < Date[2] + 1) {
  year--;
  newyear = 0;
} else if (inmonth >= 7 && inmonth > Date[2] + 1) {
  newyear = 1;
}
for (var j = year-1;j<=year+1; j++) {
  for (var cm = 1; cm < 13; cm++) {
    var length = civMonthLength(cm, j);
    for (var i=1; i < length +1; i++) {
      var Date = civ2heb(i,cm,j);
      var offset=0;
  
      if (Math.abs(Date[2]+1 - cm) > 6)
        offset = Math.abs(Math.abs(Date[2]+1 - cm) - 12);
      else
       offset = Math.abs(Date[2]+1 - cm);
  
      if (max < offset) {
        max = offset;
      }
      if (min > offset) {
        min = offset;
      }
    } 
  }
}
//alert(max+'/'+min);
var begmax = ((inmonth + max) > 12 ? (inmonth + max - 12) : (inmonth + max));
var begmin = ((inmonth + min) > 12 ? (inmonth + min - 12) : (inmonth + min));
var begmaxyear = (((inmonth + max) <= 12) ? year : year + 1);
var begminyear = (((inmonth + min) <= 12) ? year : year + 1);
begmaxyear-=newyear;
begminyear-=newyear;
//alert(begmaxyear+'/'+begmax+'///'+begminyear+'/'+begmin);
var Result = null;
if (begminyear != begmaxyear) {
for (j = begminyear; j<=begmaxyear; j++) {
var month = begmin;
for(; month < 13; month++) { 
  if (month >= begmax+1 && j > begminyear) {
    break;
  }
  var length = civMonthLength(month, j);
  for (var i=1; i < length +1; i++) {
     var TmpDate = civ2heb(i, month, j);
     if (TmpDate[1] ==  inday && TmpDate[2] == inmonth - 1 && TmpDate[3] == inyear) {
       Result = new Array (i,month,j);
     }
  }
}
if (month == 13) {
    begmin = 1;
}
}
} else {
for(var month = begmin; month < begmax+1; month++) { 
  var length = civMonthLength(month, begmaxyear);
  for (var i=1; i < length +1; i++) {
     var TmpDate = civ2heb(i, month, begmaxyear);
     if (TmpDate[1] ==  inday && TmpDate[2] == inmonth - 1 && TmpDate[3] == inyear) {
       Result = new Array (i,month,begmaxyear);
     }
  }
}
}
return Result;
}
