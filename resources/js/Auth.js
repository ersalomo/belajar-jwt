$(document).ready(function () {
    // $("#sing-in").on("submit", function (e) {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     const o = "rtl" === $("html").attr("data-textdirection");
    //     $.ajax({
    //         url: e.target["action"],
    //         method: e.target["method"],
    //         processData: false,
    //         contentType: false,
    //         dataType: "json",
    //         data: new FormData(e.target),
    //         beforeSend: function (res) {
    //             $(e.target).find("span.error-text").text("");
    //         },
    //         success: function (res) {
    //             if (!res.status) {
    //                 $.each(res.errors, (prefix, val) => {
    //                     // $("span." + prefix + "_error").text(val[0]);
    //                     toastr.warning(prefix + ":" + val, {
    //                         positionClass: "toast-top-center",
    //                         closeButton: !0,
    //                         tapToDismiss: !1,
    //                         rtl: o,
    //                     });
    //                 });
    //                 return;
    //             }
    //             toastr.success("Berhasil Login", {
    //                 positionClass: "toast-top-center",
    //                 closeButton: !0,
    //                 tapToDismiss: !1,
    //                 rtl: o,
    //             });
    //             $(e.target)[0].reset();
    //             localStorage.setItem("acces_token", res.access_token);
    //             window.location.href = "/home?token=" + res.access_token;
    //         },
    //         error: function ({ responseJSON }) {
    //             toastr.warning(responseJSON.error, {
    //                 positionClass: "toast-top-center",
    //                 closeButton: !0,
    //                 tapToDismiss: !1,
    //                 rtl: o,
    //             });
    //             console.log(responseJSON, "eerpr");
    //         },
    //     });
    // });
    $("#sign-up").on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        const o = "rtl" === $("html").attr("data-textdirection");
        $.ajax({
            url: e.target["action"],
            method: e.target["method"],
            processData: false,
            contentType: false,
            dataType: "json",
            data: new FormData(e.target),
            beforeSend: function (res) {
                $(e.target).find("span.error-text").text("");
            },
            success: function (res) {
                if (!res.status) {
                    $.each(res.errors, (prefix, val) => {
                        // $("span." + prefix + "_error").text(val[0]);
                        toastr.warning(prefix + ":" + val, {
                            positionClass: "toast-top-center",
                            closeButton: !0,
                            tapToDismiss: !1,
                            rtl: o,
                        });
                    });
                    return;
                }
                toastr.success("Berhasil Login", {
                    positionClass: "toast-top-center",
                    closeButton: !0,
                    tapToDismiss: !1,
                    rtl: o,
                });
                $(e.target)[0].reset();
                localStorage.setItem("acces_token", res.access_token);
                window.location.href = "/home?token=" + res.access_token;
            },
            error: function (res) {
                console.log(res);
                $.each(res.responseJSON.errors, (prefix, val) => {
                    $("span." + prefix + "_error").text(val[0]);
                });
            },
        });
    });
});
