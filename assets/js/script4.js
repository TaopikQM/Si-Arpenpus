
const nav = document.querySelector('nav');
const navMenu = document.querySelector('nav .nav-menu');

if(window.scrollY > 20) {
    nav.classList.add('active');
} else {
    nav.classList.remove('active');
}

window.addEventListener('scroll', function () {
    if(!navMenu.classList.contains('show')) {
        if(this.scrollY > 20) {
            nav.classList.add('active');
        } else {
            nav.classList.remove('active');
        }
    }
})

 // Fungsi untuk mengatur timeout dan logout
 function setLogoutTimeout() {
	var timeoutMinutes = 3000; // Waktu timeout dalam menit (contoh: 30 menit)
	var timeoutMilliseconds = timeoutMinutes * 60 * 1000; // Konversi menit ke milidetik

	setTimeout(function() {
		// Logout secara otomatis
		window.location.href = "<?php echo site_url('auth/logout'); ?>"; // Ganti dengan URL logout Anda
	}, timeoutMilliseconds);
}

// Panggil fungsi saat halaman dimuat
setLogoutTimeout();


//humberger menu
const navbarToggle = document.getElementById('navbar-toggle');
// const navMenu = document.querySelector('.nav-menu');
const navMenuMobile = document.querySelector('.nav-menu-mobile');
const menu = document.querySelector('.menu-item');

    navbarToggle.addEventListener('change', function() {
       /* if (this.checked) {
            navMenu.classList.add('show');
        } else {
            navMenu.classList.remove('show');
        }*/
		if (this.checked) {
			navMenuMobile.style.display = 'flex';
			menu.classList.add('hide-on-mobile');
		} else {
			navMenuMobile.style.display = 'none';
			menu.classList.remove('hide-on-mobile');
		}
    });


function toggleProfileMenu() {
    var profileMenu = document.getElementById('profileMenu');
    if (profileMenu.style.display === 'block') {
        profileMenu.style.display = 'none';
    } else {
        profileMenu.style.display = 'block';
    }
}
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("searchInput");
    var table = document.getElementById("DataTables_Table_0");
    var rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    searchInput.addEventListener("keyup", function(event) {
      var searchQuery = event.target.value.toLowerCase();

      for (var i = 0; i < rows.length; i++) {
        var rowData = rows[i].textContent.toLowerCase();

        if (rowData.includes(searchQuery)) {
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
      }
    });
  });

  
  function openPrintPreview() {
  // Buka halaman baru menggunakan window.open()
  var printWindow = window.open("", "_blank");

  // Buat konten HTML baru untuk halaman cetak
  var printContent = "<html><head><title>Cetak SD</title></head><body>";
  
  // Tambahkan judul halaman cetak
  printContent += "<h1>Data Pendidikan SD</h1>";

  // Mendapatkan referensi ke tabel atau data yang ingin dicetak
  var table = document.getElementById("DataTables_Table_0"); // Ganti dengan ID tabel yang sesuai
  
  // Mendapatkan HTML dari tabel
  var tableHTML = table.outerHTML;

  // Tambahkan HTML tabel ke konten cetak
  printContent += tableHTML;

  // Tambahkan script untuk otomatis memicu cetak
  printContent += "<script>window.onload = function() { window.print(); };</script>";
  
  printContent += "</body></html>";

  // Set konten HTML ke halaman cetak baru
  printWindow.document.open();
  printWindow.document.write(printContent);
  printWindow.document.close();
}

function openPrintPreviewSMP() {
    // Buka halaman baru menggunakan window.open()
    var printWindow = window.open("", "_blank");
  
    // Buat konten HTML baru untuk halaman cetak
    var printContent = "<html><head><title>Cetak SMP</title></head><body>";
    
    // Tambahkan judul halaman cetak
    printContent += "<h1>Data Pendidikan SMP</h1>";
  
    // Mendapatkan referensi ke tabel atau data yang ingin dicetak
    var table = document.getElementById("DataTables_Table_SMP"); // Ganti dengan ID tabel yang sesuai
    
    // Mendapatkan HTML dari tabel
    var tableHTML = table.outerHTML;
  
    // Tambahkan HTML tabel ke konten cetak
    printContent += tableHTML;
  
    // Tambahkan script untuk otomatis memicu cetak
    printContent += "<script>window.onload = function() { window.print(); };</script>";
    
    printContent += "</body></html>";
  
    // Set konten HTML ke halaman cetak baru
    printWindow.document.open();
    printWindow.document.write(printContent);
    printWindow.document.close();
  }

	function openPrintPreviewSSMA() {
		// Mendapatkan referensi ke tabel atau data yang ingin dicetak
		var table = document.getElementById("DataTables_Table_SMA"); // Ganti dengan ID tabel yang sesuai
	
		// Mendapatkan HTML dari tabel
		var tableHTML = table.outerHTML;
	
		// Buat konten HTML baru untuk halaman cetak
		var printContent = "<html><head><title>Cetak SMA</title>";
		
		// Tambahkan gaya CSS untuk judul tabel
		printContent += "<style>";
		printContent += "table th { background-color: #f2f2f2; }"; // Atur warna latar belakang judul tabel
		printContent += "</style>";
		
		printContent += "</head><body style='text-align: center;'>"; // Mengatur text-align ke center
	
		// Tambahkan judul halaman cetak
		printContent += "<h1 style='background-color: #f2f2f2; padding: 10px;'>Data Pendidikan SMA</h1>"; // Atur warna latar belakang dan padding pada judul tabel
	
		// Tambahkan HTML tabel ke konten cetak
		printContent += "<table style='margin: 0 auto; border-collapse: collapse; text-align: left;'>"; // Mengatur margin ke auto dan border-collapse ke collapse
		printContent += tableHTML;
		printContent += "</table>";
	
		printContent += "</body></html>";
	
		// Kirim konten cetak ke server untuk menghasilkan PDF
		$.ajax({
			url: 'your_controller/generatePdf', // Ganti your_controller dengan nama controller yang sesuai
			method: 'POST',
			data: { content: printContent },
			success: function(response) {
				// Menampilkan tautan unduh PDF jika berhasil menghasilkan PDF
				var downloadLink = "<a href='" + response.filepath + "' target='_blank'>Unduh PDF</a>";
				$("#pdfDownloadLink").html(downloadLink);
			},
			error: function() {
				// Menampilkan pesan jika terjadi kesalahan dalam menghasilkan PDF
				$("#pdfDownloadLink").html("Terjadi kesalahan dalam menghasilkan PDF.");
			}
		});
	}
	function openPrintPreviewSMA() {
		// Buka halaman baru menggunakan window.open()
		var printWindow = window.open("", "_blank");
	
		// Buat konten HTML baru untuk halaman cetak
		var printContent = "<html><head><title>Cetak SMA</title>";
		printContent += "<style>";
		printContent += "h1 { color: blue; }"; // Menambahkan warna biru pada judul
		printContent += "table { margin: 0 auto; }"; // Mengatur tabel agar berada di tengah
		printContent += "table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; }"; // Menambahkan garis dan jarak pada tabel
		printContent += "</style>";
		printContent += "</head><body>";
	
		// Tambahkan judul halaman cetak
		printContent += "<h1>Data Pendidikan SMA</h1>";
	
		// Mendapatkan referensi ke tabel atau data yang ingin dicetak
		var table = document.getElementById("DataTables_Table_SMA"); // Ganti dengan ID tabel yang sesuai
	
		// Mendapatkan HTML dari tabel
		var tableHTML = table.outerHTML;
	
		// Tambahkan HTML tabel ke konten cetak
		printContent += tableHTML;
	
		// Tambahkan script untuk otomatis memicu cetak
		printContent += "<script>window.onload = function() { window.print(); };</script>";
	
		printContent += "</body></html>";
	
		// Set konten HTML ke halaman cetak baru
		printWindow.document.open();
		printWindow.document.write(printContent);
		printWindow.document.close();
	}
	
		

function openPrintPreviewSMK() {
    // Buka halaman baru menggunakan window.open()
    var printWindow = window.open("", "_blank");
  
    // Buat konten HTML baru untuk halaman cetak
    var printContent = "<html><head><title>Cetak SMK</title></head><body>";
    
    // Tambahkan judul halaman cetak
    printContent += "<h1>Data Pendidikan SMK</h1>";
  
    // Mendapatkan referensi ke tabel atau data yang ingin dicetak
    var table = document.getElementById("DataTables_Table_SMK"); // Ganti dengan ID tabel yang sesuai
    
    // Mendapatkan HTML dari tabel
    var tableHTML = table.outerHTML;
  
    // Tambahkan HTML tabel ke konten cetak
    printContent += tableHTML;
  
    // Tambahkan script untuk otomatis memicu cetak
    printContent += "<script>window.onload = function() { window.print(); };</script>";
    
    printContent += "</body></html>";
  
    // Set konten HTML ke halaman cetak baru
    printWindow.document.open();
    printWindow.document.write(printContent);
    printWindow.document.close();
  }
  

  //pindah halaman jika grafik di klik 
  
  
  