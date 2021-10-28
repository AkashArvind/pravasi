document.addEventListener('DOMContentLoaded', function (event) {

	'use strict';

	// Initialise resize library
	var resize = new window.resize();
	resize.init();
	
	// Upload photo
	var upload = function (exifData,name,photo, callback) {

		var formData = new FormData();
		formData.append('photo', photo);
		formData.append('photoname',name);
		
		
		formData.append('exifDatas',exifData);
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (request.readyState === 4) {
				callback(request.response);
			}
		}
		request.open('POST', 'php/uploadawards.php');
		request.responseType = 'json';
		request.send(formData);
	};

	var fileSize = function (size) {
		var i = Math.floor(Math.log(size) / Math.log(1024));
		return (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
	};
	var flag=1;
	document.querySelector('form input[type=file]').addEventListener('change', function (event) {
		event.preventDefault();

		//code for loading gif start
		var span = document.getElementById('loading');
        span.innerHTML += '<img src="loading2.gif" width="40px"><p style="font-size:15px !important;">Reducing the size of pictures and uploading.</p><p style="font-size:17px !important;">This can take some time, please wait.</p>';

        var totalInitailsize=0;
        var totalresizedsize=0;
        var totalpercentage=0;

		var files = event.target.files;

		var numFiles = $("input:file")[0].files.length;
		var count =0;
		
		for (var i in files) {
				
			if (typeof files[i] !== 'object') return false;

			(function () {

				var initialSize = files[i].size;
				//exifData1 = new Array();
				var name = files[i].name;
				var exifData="nil";
				EXIF.getData(files[i], function() {
					//alert("No EXIF data found in image '");
                    var exifData1 = EXIF.pretty(this);
                   // alert(exifData1);
                  
                    
                   if (exifData1) {
                       // alert(exifData);
                      
                       exifData=exifData1;
                   } else {
                        alert("No EXIF data found in image '" + file.name + "'.");
                    }
                });

				var name=files[i].name;

				/*if (files[i] &&files[i].name) {   
                EXIF.getData(files[i], function() {alert("hghgh");
                    var exifData = EXIF.pretty(files[i]);
                    if (exifData) {
                        alert(exifData);
                    } else {
                        alert("No EXIF data found in image '" + files[i].name + "'.");
                    }
                });
            }*/
				resize.photo(files[i], 1200, 'file', function (resizedFile) {

					var resizedSize = resizedFile.size;
//alert(exifData);
					
					upload(exifData,name,resizedFile, function (response) {

						var rowElement = document.createElement('tr');
						count++;
						if(response.error!="no"){
						//rowElement.innerHTML = '<td>'+new Date().getHours()+':'+new Date().getMinutes()+':'+new Date().getSeconds()+'</td><td>'+name+'</td><td>'+fileSize(initialSize)+'</td><td>'+fileSize(resizedSize)+'</td><td>'+Math.round((initialSize - resizedSize) / initialSize * 100)+'%</td><td>'+count+' out of '+numFiles+'</td>';
						///location.reload(count);
						//location.href=location.href+"&cc="+count;	
						flag=0;
						}else{
							flag=1;
						//rowElement.innerHTML = '<td>'+new Date().getHours()+':'+new Date().getMinutes()+':'+new Date().getSeconds()+'</td><td>'+name+'</td><td>'+fileSize(initialSize)+'</td><td>'+fileSize(resizedSize)+'</td><td>'+Math.round((initialSize - resizedSize) / initialSize * 100)+'%</td><td>'+count+' out of '+numFiles+'</td>';
						}

						totalInitailsize=totalInitailsize+initialSize;
						totalresizedsize=totalresizedsize+resizedSize;

						document.querySelector('table.images tbody').appendChild(rowElement);
						if(flag==1){
							if(numFiles==count ){
								var rowElement1 = document.createElement('tr');
								rowElement1.innerHTML = '<td colspan="6" style="" class="text-center"><p style="font-size:15px !important;">Total file size: '+fileSize(totalInitailsize)+'<br>Uploaded file size: '+fileSize(totalresizedsize)+'<br>Reduced: <big>'+Math.round((totalInitailsize - totalresizedsize) / totalInitailsize * 100)+'%</big><br>All images file size reduced and uploaded successfully</p><a class="btn btn-info" onload="hidetextbox();" onclick="location.reload();">Back</a ></td>';	
								document.querySelector('table.images tbody').appendChild(rowElement1);
								document.getElementById("uploadph").style.display="none";
								document.getElementById("details").style.display="none";
								var elem = document.getElementById("loading");
	                            elem.parentNode.removeChild(elem);
							}
						}
						else{
							if(numFiles==count ){
								var rowElement1 = document.createElement('tr');
								rowElement1.innerHTML = '<td colspan="6" style="" class="text-center"><p style="font-size:15px !important;">Total file size: '+fileSize(totalInitailsize)+'<br>Uploaded file size: '+fileSize(totalresizedsize)+'<br>Reduced: <big>'+Math.round((totalInitailsize - totalresizedsize) / totalInitailsize * 100)+'%</big><br>Sorry not upload all (image upload count limited to 10)</p><a class="btn  btn-info" onload="hidetextbox();" onclick="location.reload();">Back</a ></td>';	
								document.querySelector('table.images tbody').appendChild(rowElement1);
								document.getElementById("uploadph").style.display="none";
								document.getElementById("details").style.display="none";
								var elem = document.getElementById("loading");
	                            elem.parentNode.removeChild(elem);
	                         }
						}
						
					});
					
					// This is not used in the demo, but an example which returns a data URL so yan can show the user a thumbnail before uploading th image.
					resize.photo(resizedFile, 600, 'dataURL', function (thumbnail) {
						console.log('Display the thumbnail to the user: ', thumbnail);
					});

				});

			}());
			
			
		}

	});

});
