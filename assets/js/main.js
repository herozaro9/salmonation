(function ($) {
    "use strict";
    $("#navbar-toogle").click(function(){
        $( "#navbarNavDropdown" ).slideToggle( "slow", function() {
        });
    })
    $("#loader").fadeOut();

    // FAQ
    $(".card-faq").find('.card-header').click(function(){
        if($(this).find('.btn-col-faq').hasClass('collapsed')){
            $(this).find('.icon-faq').find('.fas').removeClass('fa-chevron-right')
            $(this).find('.icon-faq').find('.fas').addClass('fa-chevron-down')
        }else{
            $(this).find('.icon-faq').find('.fas').removeClass('fa-chevron-down')
            $(this).find('.icon-faq').find('.fas').addClass('fa-chevron-right')
        }
    })
    $("#doktermodal").click(function(){
        $.ajax({
            url: 'https://api.misidok.id/api/tindakanmedisaktifdokterid?kategori_dokter_id=kategori-1',
            data: {},
            method: "GET",
            success: function(response, status, xhr) {
                var html = '';
                if (!response.error) {
                    var tindakan = response.data;
                    tindakan.forEach(function(val, index) {
                        html += `<li class="list-group-item pt-2 pb-2"><h6 class="mb-0"><b>${val.nama_tindakan}</b></h6><small>Rp ${rupiah(val.harga_tindakan)}</small></li></div></li>`
                    });
                    $("#list-tindakan-dokter").html(html)
                }
            },
            error: function(xhr, status) {
                $("#list-tindakan-dokter").html(`<li class="list-group-item text-center"><b>Tindakan Tidak Ditemukan</b></li>`)
            }
        });
    })

    $("#bidanmodal").click(function(){
        $.ajax({
            url: 'https://api.misidok.id/api/tindakanmedisaktifdokterid?kategori_dokter_id=kategori-3',
            data: {},
            method: "GET",
            success: function(response, status, xhr) {
                var html = '';
                if (!response.error) {
                    var tindakan = response.data;
                    tindakan.forEach(function(val, index) {
                        html += `<li class="list-group-item pt-2 pb-2"><h6 class="mb-0"><b>${val.nama_tindakan}</b></h6><small>Rp ${rupiah(val.harga_tindakan)}</small></li></div></li>`
                    });
                    $("#list-tindakan-bidan").html(html)
                }
            },
            error: function(xhr, status) {
                $("#list-tindakan-bidan").html(`<li class="list-group-item text-center"><b>Tindakan Tidak Ditemukan</b></li>`)
            }
        });
    })

    $("#fisioterapismodal").click(function(){
        $.ajax({
            url: 'https://api.misidok.id/api/tindakanmedisaktifdokterid?kategori_dokter_id=kategori-4',
            data: {},
            method: "GET",
            success: function(response, status, xhr) {
                var html = '';
                if (!response.error) {
                    var tindakan = response.data;
                    tindakan.forEach(function(val, index) {
                        html += `<li class="list-group-item pt-2 pb-2"><h6 class="mb-0"><b>${val.nama_tindakan}</b></h6><small>Rp ${rupiah(val.harga_tindakan)}</small></li></div></li>`
                    });
                    $("#list-tindakan-fisioterapis").html(html)
                }
            },
            error: function(xhr, status) {
                $("#list-tindakan-fisioterapis").html(`<li class="list-group-item text-center"><b>Tindakan Tidak Ditemukan</b></li>`)
            }
        });
    })

    $("#perawatmodal").click(function(){
        $.ajax({
            url: 'https://api.misidok.id/api/tindakanmedisaktifdokterid?kategori_dokter_id=kategori-2',
            data: {},
            method: "GET",
            success: function(response, status, xhr) {
                var html = '';
                if (!response.error) {
                    var tindakan = response.data;
                    tindakan.forEach(function(val, index) {
                        html += `<li class="list-group-item pt-2 pb-2"><h6 class="mb-0"><b>${val.nama_tindakan}</b></h6><small>Rp ${rupiah(val.harga_tindakan)}</small></li></div></li>`
                    });
                    $("#list-tindakan-perawat").html(html)
                }
            },
            error: function(xhr, status) {
                $("#list-tindakan-perawat").html(`<li class="list-group-item text-center"><b>Tindakan Tidak Ditemukan</b></li>`)
            }
        });
    })

    $("#tindakanmedismodal").click(function(){
        $.ajax({
            url: 'https://api.misidok.id/api/tindakanmedisaktifdokterid?kategori_dokter_id=kategori-2',
            data: {},
            method: "GET",
            success: function(response, status, xhr) {
                var html = '';
                if (!response.error) {
                    var tindakan = response.data;
                    tindakan.forEach(function(val, index) {
                        html += `<li class="list-group-item pt-2 pb-2"><h6 class="mb-0"><b>${val.nama_tindakan}</b></h6><small>Rp ${rupiah(val.harga_tindakan)}</small></li></div></li>`
                    });
                    $("#list-tindakan-medis-perawat").html(html)
                }
            },
            error: function(xhr, status) {
                $("#list-tindakan-medis-perawat").html(`<li class="list-group-item text-center"><b>Tindakan Tidak Ditemukan</b></li>`)
            }
        });

        $.ajax({
            url: 'https://api.misidok.id/api/tindakanmedisaktifdokterid?kategori_dokter_id=kategori-1',
            data: {},
            method: "GET",
            success: function(response, status, xhr) {
                var html = '';
                if (!response.error) {
                    var tindakan = response.data;
                    tindakan.forEach(function(val, index) {
                        html += `<li class="list-group-item pt-2 pb-2"><h6 class="mb-0"><b>${val.nama_tindakan}</b></h6><small>Rp ${rupiah(val.harga_tindakan)}</small></li></div></li>`
                    });
                    $("#list-tindakan-medis-dokter").html(html)
                }
            },
            error: function(xhr, status) {
                $("#list-tindakan-medis-dokter").html(`<li class="list-group-item text-center"><b>Tindakan Tidak Ditemukan</b></li>`)
            }
        });

        $.ajax({
            url: 'https://api.misidok.id/api/tindakanmedisaktifdokterid?kategori_dokter_id=kategori-3',
            data: {},
            method: "GET",
            success: function(response, status, xhr) {
                var html = '';
                if (!response.error) {
                    var tindakan = response.data;
                    tindakan.forEach(function(val, index) {
                        html += `<li class="list-group-item pt-2 pb-2"><h6 class="mb-0"><b>${val.nama_tindakan}</b></h6><small>Rp ${rupiah(val.harga_tindakan)}</small></li></div></li>`
                    });
                    $("#list-tindakan-medis-bidan").html(html)
                }
            },
            error: function(xhr, status) {
                $("#list-tindakan-bidan").html(`<li class="list-group-item text-center"><b>Tindakan Tidak Ditemukan</b></li>`)
            }
        });

        $.ajax({
            url: 'https://api.misidok.id/api/tindakanmedisaktifdokterid?kategori_dokter_id=kategori-4',
            data: {},
            method: "GET",
            success: function(response, status, xhr) {
                var html = '';
                if (!response.error) {
                    var tindakan = response.data;
                    tindakan.forEach(function(val, index) {
                        html += `<li class="list-group-item pt-2 pb-2"><h6 class="mb-0"><b>${val.nama_tindakan}</b></h6><small>Rp ${rupiah(val.harga_tindakan)}</small></li></div></li>`
                    });
                    $("#list-tindakan-medis-fisioterapi").html(html)
                }
            },
            error: function(xhr, status) {
                $("#list-tindakan-medis-fisioterapi").html(`<li class="list-group-item text-center"><b>Tindakan Tidak Ditemukan</b></li>`)
            }
        });
    })

    $("#searchblog").submit(function(e){
        e.preventDefault();
        var search = $("#search").val();
        $.ajax({
            url: '/blog/search?q='+search,
            data: {},
            method: "GET",
            success: function(response, status, xhr) {
                window.location.href = '/blog/search?q='+search;
            },
            error: function(xhr, status) {
                swal('Notifikasi', 'Ulangi pencarian blog!', 'error')
            }
        });
    })

})(jQuery);

function rupiah(price) {
    const pieces = parseFloat(price).toFixed(2).split('')
    let ii = pieces.length - 3
    while ((ii -= 3) > 0) {
        pieces.splice(ii, 0, '.')
    }
    return pieces.join('').substring(0, pieces.length - 3)
}