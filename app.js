// CONSTANTS

const express = require('express')
const app = express()
const hogan = require('hogan-express')
const http_module = require('http')
const http = http_module.Server(app)

// MAIN MODULE

app.engine('html', hogan)
app.set('port', (process.env.PORT || 1984))
app.use('/', express.static(__dirname + '/public/'))

const Cosmic = require('cosmicjs')
const helpers = require('./helpers')
const bucket_slug = process.env.COSMIC_BUCKET || 'simple-blog-website'
const read_key = process.env.COSMIC_READ_KEY
const partials = {
  header: 'partials/header',
  footer: 'partials/footer'
}

app.use('/', (req, res, next) => {
    res.locals.year = new Date().getFullYear()
    next()
})