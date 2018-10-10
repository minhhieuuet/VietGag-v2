 var data = {
     labels: {!!json_encode($nameCategoryArr) !! },
     series: {!!json_encode($countCategoryPostArr) !! },

 };

 var options = {
     width: 300,
     height: 200,
     labelInterpolationFnc: function(value) {
         return value;
     }
 };
 new Chartist.Pie('#roundChart', data, options);