<script>
    function diviBinary(decNumber){
        
        var rem;
        var ramStack = new Stack();
        var binaryString = '';
        while(decNumber>0){
            rem = Math.floor(decNumber%2);
            ramStack.push(rem);
            decNumber = Math.floor(decNumber/2);
        }
        while(!ramStack.isEmpty()){
            binaryString += ramStack.pop().toString();
        }
        return binaryString;
    }
    
    function baseCoverter(decNumber,base){
        
        var ramStack = new Stack(),
            rem,
            baseString='',
            digits='0123456789ABCDEF';
        
        while(decNumber>0){
            rem = Math.floor(decNumber%base);
            ramStack.push(rem);
            decNumber = Math.floor(decNumber/base);
        }
        
        while(!ramStack.isEmpty()){
            baseString += digits[ramStack.pop()];
        }
        
        return baseString;
        
    }
    
    function Queue(){
        var items=[];
        this.enqueue=function(element){
            items.push(element);
        }
        this.dequeue=function(){
            return  items.shift();
        }
        this.front=function(){
            return items[0];
        }
        this.isEmpty=function(){
            return items.length==0;
        }
        this.size=function(){
            return items.length;
        }
        this.print=function(){
            console.log(items.toString());
        }
    }
    
    function Stack(){
        
        var items =[];
        
        this.push=function(element){
            items.push(element)
        }
        this.pop=function(){
            return items.pop();
        }
        this.peek=function(){
            return items[items.length-1];
        }
        this.isEmpty=function(){
            return items.length ==0;
        }
        this.size=function(){
            return items.length;
        }
        this.clear = function(){
            items=[];
        }
        this.print = function(){
            console.log(items.toString());
        }
    }
    
     
    
    
    var stack1 = new Stack();
    
    stack1.push("sky");
    stack1.push("hanna");
    
    //console.log(stack1.peek())
    
    stack1.push("amila");
    //console.log(stack1.size());
    //stack1.print()

    //console.log(diviBinary(443));
    //console.log(baseCoverter(443,2));
    // console.log(baseCoverter(100345,8));
    // console.log(baseCoverter(100345,16));
    
    
    
    var queue1 = new Queue();
    queue1.enqueue("sky");
    queue1.enqueue("angleina");
    //queue1.print();
    queue1.dequeue();
    queue1.enqueue("hanna tong");
    //queue1.print();
    
    
    
    
    
</script>
<h1>Guest Page2</h1>
<p><?php echo $baselocate ?></p>
 
 