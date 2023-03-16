const PORT = process.env.PORT || 8082;

var express = require('express');
var app = express();
var fs = require('fs-extra');
var path = require('path');
var mdMeta = require('markdown-it-meta');
var hljs = require('highlight.js');
var md = require('markdown-it')({
    html: true,
    linkify: true,
    typographer: true,
    highlight: function (str, lang) {
        if (lang && hljs.getLanguage(lang)) {
            try {
                return '<pre class="hljs"><code>' +
                    hljs.highlight(lang, str, true).value +
                    '</code></pre>';
            } catch (__) { }
        }
        return '<pre class="hljs"><code>' + md.utils.escapeHtml(str) + '</code></pre>';
    }
}).use(mdMeta);

// Start server
var server = app.listen(PORT, function() {
    console.log('Server has started on port ' + PORT);
}); 

app.set('view engine', 'ejs');
app.use(express.static(path.join(__dirname, 'public')));


app.get('/', function(req, res) {
    var filePath = './public/example.md';   // Устанавливаем файл с md
    var css = 'atom-one-dark.css';          // Подсветка синтаксиса

    var rawMd = fs.readFileSync(filePath, 'utf8');
    var html = md.render(rawMd);
    var metaData = md.meta;
    var title = metaData.title;
    var description = md.description;
    var date = new Date(metaData.date).toDateString();

    res.render('blog', {
        title: title,
        date: date,
        description: description,
        html: html,
        css: css
    });
});

module.exports = app; 