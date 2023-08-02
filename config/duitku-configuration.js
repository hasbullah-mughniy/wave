const duitkuConfig = {
    merchantCode : "DS16354",
    apiKey : "8f3ad8846420adddb9aaca1dc9e85656",
    passport : true,
    callbackUrl : "https://digivit.triptasoft.com/payment/callback",
    returnUrl : "https://example/route/return",
    accountLinkReturnUrl : "https://localhost/dashboard/user",
    expiryPeriod: 1440
};

module.exports = duitkuConfig;