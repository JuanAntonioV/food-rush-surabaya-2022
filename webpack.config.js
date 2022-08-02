const path = require("path");

module.exports = {
    mode: "development",
    output: {
        filename: "my-first-webpack.bundle.js",
    },
    module: {
        rules: [
            {
                test: /\.(gif|png|jpe?g|svg|xml|ogg|wav|mp3)$/i,
                use: "file-loader",
            },
        ],
    },
};
