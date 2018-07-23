<script>
    var num =1;
    num =3;
   
    var nullVar = null;
    var und;
    
    document.write("空值變數: "+nullVar);
    document.write("<br>");
    document.write("未定義變數: ",und);
    
    var myVar = 'global';
    windowVar = 'global';
    
    function myVarPrint(){
        var myVar = 'local';
        return myVar;
    }
    function windowVarPtint(){
        windowVar = 'local';
        return windowVar;
    }
    
    // console.log(windowVar);
    // console.log(windowVarPtint());
    // console.log(windowVar);
    
    var xt =typeof num;
    var tf = new Boolean(false);
    var na = NaN;
    
    function testTruth(val){
        return val?true:false;
    }
     
    var condiB= function(title,isbn){
        this.title = title;
        this.isbn = isbn;
        this.print= function(){
            console.log('title: '+this.title+',isbn: '+this.isbn);
        };
        
        this.print();
    }
    
    function arrayFibnaci(){
        var fibRow = [];
        fibRow[1]=1;
        fibRow[2]=1;
        
        for(var i=3;i<20;i++){
            fibRow[i]=fibRow[i-1]+fibRow[i-2];
        }
        //console.log(fibRow);
        return fibRow;
    }
     
    function arrayUnShift(){
        var selfRow = [0,1,2,3,4,5,6];
        for(i=selfRow.length;i>=0;i--){
            selfRow[i]=selfRow[i-1];
        }
        selfRow[0]=-1;
        console.log(selfRow);
    }
    
    function isEven(x){
        return (x%2==0);
    }
    
    var iniArr = [1,2,3,4,5,6,7,8,9];
    
    var sorSrr = [7,5,4,9,8,10,15,11,9];
    //var TT = new condiB('testNum','4453234');
    var arr1= new arrayFibnaci();
    //var arr2 = new arrayUnShift();
    
    var myMap=iniArr.map(isEven);
    
    var arr3 = iniArr.reduce(function(previous,current,index,array){
        //console.log(previous);
        return array;
    })
    
    var arr4 = sorSrr.sort(function(a,b){
        return a-b;
    })
    
    function compare(a,b){
        if(a<b){
            return -1;
        }
        if(a>b){
            return 1;
        }
        return 0;
    }
    
    var arr5=sorSrr.sort(compare);
    
    var friends = [
      {name:'amila',age:29},
      {name:'sky',age:30},
      {name:'hanna Tang',age:27}
    ]
    
    function comparePerson(a,b){
      if(a.age<b.age){
          return -1;
      }    
      if(a.age>b.age){
          return 1;
      }    
      return 0;
    }
    
    var arr6 = [7,9,3,11,17,6,7];
    
    
    console.log(arr1);
    console.log('0'==false);
    console.log(45=='45');
    
    //console.log(friends.sort(comparePerson));
    //console.log(arr6.lastIndexOf(7));
    //console.log(myMap);
    //console.log(iniArr.filter(isEven));
    //console.log(arr3);
    //console.log(arr5);
    
</script>
   <h1>Guest Page</h1>
   <p><?php echo $baselocate ?></p>
 