3<!doctype html>
<html lang="en">
    <head>
        <script src="https://unpkg.com/@paypal/paypal-js@8.0.0/dist/iife/paypal-js.min.js"></script>
    </head>
    <body>
        <div id="paypalButtons"></div>
        <script>
            window.paypalLoadScript({ clientId: "Ac45sG1IbQ_L21stWgWlZhGWjuyp_VJ12c5YVk-HLj1_MNDNgHJMPcJWT64Gc0JlMvk8qb81Z_8e37uq" }).then((paypal) => {
                paypal.Buttons().render("#paypalButtons");
            });
        </script>
    </body>
</html>