
var _num = 20;

function LastRe(){
	this.bookList="bookList"
	}
LastRe.prototype={	
	set:function(bid,tid,title,texttitle){
		if(!(bid&&tid&&title&&texttitle))return;
		var v=bid+'#'+tid+'#'+title+'#'+texttitle;
		this.setItem(bid,v);
		this.setBook(bid)		
		},
	
	get:function(k){
		return this.getItem(k)?this.getItem(k).split("#"):"";						
		},
	
	remove:function(k){
		this.removeItem(k);
		this.removeBook(k)			
		},
	
	setBook:function(v){
		var reg=new RegExp("(^|#)"+v); 
		var books =	this.getItem(this.bookList);
		if(books==""){
			books=v
			}
		 else{
			 if(books.search(reg)==-1){
				 books+="#"+v				 
				 }
			 else{
				  books.replace(reg,"#"+v)
				 }	 
			 }	
			this.setItem(this.bookList,books)
		
		},
	
	getBook:function(){
		var v=this.getItem(this.bookList)?this.getItem(this.bookList).split("#"):Array();
		var books=Array();
		if(v.length){
			
			for(var i=0;i<v.length;i++){
				var tem=this.getItem(v[i]).split('#');	
				if(i>v.length-(_num+1)){
					if (tem.length>3)	books.push(tem);
				}
				else{
					lastre.remove(tem[0]);
				}
			}		
		}
		return books		
	},
	
	removeBook:function(v){		
	    var reg=new RegExp("(^|#)"+v); 
		var books =	this.getItem(this.bookList);
		if(!books){
			books=""
			}
		 else{
			 if(books.search(reg)!=-1){	
			      books=books.replace(reg,"")
				 }	 
			 
			 }	
			this.setItem(this.bookList,books)		
		
		},
	
	setItem:function(k,v){
		if(!!window.localStorage){		
			localStorage.setItem(k,v);		
		}
		else{
			var expireDate=new Date();
			  var EXPIR_MONTH=30*24*3600*1000;			
			  expireDate.setTime(expireDate.getTime()+12*EXPIR_MONTH)
			  document.cookie=k+"="+encodeURIComponent(v)+";expires="+expireDate.toGMTString()+"; path=/";		
			}			
		},
		
	getItem:function(k){
		var value=""
		var result=""				
		if(!!window.localStorage){
			result=window.localStorage.getItem(k);
			 value=result||"";	
		}
		else{
			var reg=new RegExp("(^| )"+k+"=([^;]*)(;|\x24)");
			var result=reg.exec(document.cookie);
			if(result){
				value=decodeURIComponent(result[2])||""}				
		}
		return value
		
		},
	
	removeItem:function(k){		
		if(!!window.localStorage){
		 window.localStorage.removeItem(k);		
		}
		else{
			var expireDate=new Date();
			expireDate.setTime(expireDate.getTime()-1000)	
			document.cookie=k+"= "+";expires="+expireDate.toGMTString()							
		}
		},	
	removeAll:function(){
		if(!!window.localStorage){
		 window.localStorage.clear();		
		}
		else{
		var v=this.getItem(this.bookList)?this.getItem(this.bookList).split("#"):Array();
		var books=Array();
		if(v.length){
			for( i in v ){
				var tem=this.removeItem(v[k])				
				}		
			}
			this.removeItem(this.bookList)				
		}
		}	
	}

function showbook(){
	var showbook=document.getElementById('banner');
	var bookhtml='<div class="history">';
	var books=lastre.getBook();
	if(books.length){
		
		for(var i=books.length-1;i>-1;i--){//for(var i=0 ;i<books.length;i++){
			var _17mb_id1000 = parseInt(books[i][0]/1000);	
			bookhtml+='<div class="col-md-3 col-xs-12">';
			bookhtml+='<p class="historya"><span>'+(i+1)+'</span> <a target="_blank" href="http://www.janpn.com'+books[i][0]+'">《'+books[i][2]+'》</a></p>';
			bookhtml+='<p><b>看过章节：</b>'+books[i][3]+'</p>';
			bookhtml+='<p><a target="_blank" class="btn btn-primary" href="http://www.janpn.com'+books[i][1]+'" >继续阅读</a></p>';
			bookhtml+='<p><a target="_blank" class="btn btn-default" href="javascript:removebook(\''+books[i][0]+'\')">删除记录</a></p>'
			bookhtml+='</div>';
		}
		showbook.innerHTML=bookhtml+"</div>";
	}
	else{
		showbook.innerHTML=bookhtml+"还没开始阅读！</ul>";
	}
	

} 

function removebook(k){
	lastre.remove(k);
	showbook()
}


	
function yuedu(){
	//document.write("<a href='javascript:showbook();' target='_self'>点击查看阅读记录</a>");
	showbook();
}

window.lastre = new LastRe();
