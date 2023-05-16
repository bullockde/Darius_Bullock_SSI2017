<?php
/**
 * Template Name: GQListings
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */

get_header('members'); ?>

<style>

/* 
Theme Name: Responsive 
Theme URI: http://themeid.com/responsive-theme/ 
Description: Responsive Theme is a flexible foundation with fluid grid system that adapts your website to mobile devices and the desktop or any other viewing environment. Theme features 9 Page Templates, 11 Widget Areas, 6 Template Layouts, 4 Menu Positions and more. Powerful but simple Theme Options for full CMS control with easy Logo Upload, Social Networking and Webmaster Tools etc. Responsive is WooCommerce Compatible, Multilingual Ready (WPML), RTL-Language Support, Retina-Ready, Search Engine Friendly, W3C Markup Validated and currently translated into 40 languages. Cross-Browser compatible and yes even the IE7. No paid memberships or clubs to get a FREE/Responsive Support you need. http://themeid.com/help/

Version: 1.8.9.3
Author: ThemeID 
Author URI: http://themeid.com
Tags: white, black, gray, light, custom-menu, custom-header, custom-background, one-column, two-columns, left-sidebar, right-sidebar, flexible-width, theme-options, threaded-comments, full-width-template, sticky-post, translation-ready, flexible-width, rtl-language-support

License: GNU General Public License v3 or later
License URI: license.txt 

Responsive WordPress Theme, Copyright (C) 2003-2013 Emil Uzelac 

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
--------------------------------------------------------------
WARNING: (BEFORE YOU MAKE ANY CHANGES)
--------------------------------------------------------------
Please do not edit style.css or any other Theme files or 
Templates directly. If you do, your customizations will be lost 
as soon as you update Responsive.


*/

#project .btn{

  padding: 6px 40px;
  margin: 5px;
  border-radius: 3px;
}

#site-title {
  margin-right: 270px;
  padding: 1em 0;
  font-size: 30px;
}
#site-title a {
  color: #1f5087;
  font-size: 30px;
  font-weight: bold;
  line-height: 36px;
  text-decoration: none;
}
#logo img{
  float: left;
  padding: 15px;
}
#header h1, h2, h3, h4, h5, h6 {
  clear: none;
}
#header{
  padding: 15px;
}
#header h1{
  font-size: 30px;
}
#header #searchform {
  top: 1em;
  float: left;
}
.singular.page .hentry {
  padding: 0;
}
.entry-content, .entry-summary {
  padding:  0;
}
.entry-title {
  clear: both;
  padding-bottom: 0em;
  padding-top: 0px;
}

/*

WordPress and ThemeID highly recommends Child Theme.

Read More:
 
- http://codex.wordpress.org/Child_Themes  
- http://themeid.com/help/discussion/505/child-theme-example/
- http://themeid.com/help/categories/responsive-documentation

--------------------------------------------------------------
	
CSS Rules: Sorted alphabetically for better organization.


/* =Reset CSS (v2.0) http://meyerweb.com/eric/tools/css/reset/
-------------------------------------------------------------- */
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
	border: 0;
	font-size: 100%;
	font: inherit;
    margin: 0;
	padding: 0;
	vertical-align: baseline;
}

/*HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
	display:block;
}

body {
	line-height: 1;
}

ol, ul {
	list-style: none;
}

blockquote, q {
	quotes: none;
}

blockquote:before, blockquote:after, q:before, q:after {
	content: '';
	content: none;
}

table {
	border-collapse: collapse;
	border-spacing: 0;
}

button, input, select, textarea {
	font-size: 100%;
	overflow: visible;
	margin: 0;
	vertical-align: baseline;
	width: auto;
}

textarea {
	overflow: auto;
	vertical-align: text-top;
}

/* =Horizontal Rule
-------------------------------------------------------------- */
hr {
	background: #ddd;
	border: none;
	clear: both;
	color: #ddd;
	float: none;
	height: 1px;
	width: 100%;
}

hr.space {
	background: #fff;
	color: #fff;
}

/* =Base
-------------------------------------------------------------- */
html {
	height: 100%;
}

body {
	-moz-font-smoothing: antialiased;
	-webkit-font-smoothing: antialiased;

	color: #555;
	font-family: georgia;
	font-size: 14px;
	font-smoothing: antialiased;
	line-height: 1.5em;
	text-rendering: optimizeLegibility;
}
.banner-ad{
	float: left;
	margin: 5px 0 0 35px;
}
.banner-ad-page{
	float: right;
	margin: 5px 0 0 0;
}
.widget-wrapper.widget_text {
  min-height: 185px;
}
/* =Typography
-------------------------------------------------------------- */
p {  
    word-wrap: break-word;
}

i,
em,
dfn,
cite {
	font-style: italic;
}

tt,
var,
pre,
kbd,
samp,
code {
	font-family: monospace, serif;
	font-style: normal;
}

b,
strong {
	font-weight: 700;
}

pre {
    -moz-box-sizing: border-box;   
	-moz-border-radius: 2px;
	-moz-box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0,0,0,0.2);
	-webkit-border-radius: 2px;
	-webkit-box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0,0,0,0.2);
    -webkit-box-sizing: border-box;
	box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0,0,0,0.2);
    box-sizing: border-box;
	border: 1px solid #aaa;
	border-bottom-color: #ccc;
	border-radius: 2px;
    height: auto;
	margin: 0;
	outline: none;
	padding: 6px 10px;
	vertical-align: middle;
    width: 100%;
    word-wrap: break-word;
    white-space: pre-wrap;
}

del {
	color: #555;
	text-decoration: line-through;
}

ins, 
dfn {
	border-bottom: 1px solid #ccc;
}

sup, 
sub,
small {
	font-size: 85%;
}

abbr, 
acronym {
	font-size: 85%;
	letter-spacing: .1em;
	text-transform: uppercase;
}

a abbr, 
a acronym {
	border: none;
}

dfn[title],
abbr[title], 
acronym[title] {
	border-bottom: 1px solid #ccc;
	cursor: help;
}

sup {
	vertical-align: super;
}

sub {
	vertical-align: sub;
}

/* =Responsive 12 Column Grid
    http://themeid.com/responsive-grid/
-------------------------------------------------------------- */
.grid {
	float: left;
	margin-bottom: 2.127659574468%;
	padding-top: 0;
}

.grid-right {
	float: right;
	margin-bottom: 2.127659574468%;
	padding-top: 0;
}

.col-60, 
.col-140, 
.col-220, 
.col-300, 
.col-380, 
.col-460, 
.col-540, 
.col-620, 
.col-700, 
.col-780, 
.col-860 {
	display: inline;
	margin-right: 2.127659574468%;
}

.col-60 {
	width: 6.382978723404%;
}

.col-140 {
	width: 14.893617021277%;
}

.col-220 {
	width: 23.404255319149%;
}

.col-300 {
	width: 31.914893617021%;
}

.col-380 {
	width: 40.425531914894%;
}

.col-460 {
	width: 48.936170212766%;
}

.col-540 {
	width: 57.446808510638%;
}

.col-620 {
	width: 65.957446808511%;
}

.col-700 {
	width: 74.468085106383%;
}

.col-780 {
	width: 82.978723404255%;
}

.col-860 {
	width: 91.489361702128%;
}

.col-940 {
	width: 100%;
}

.fit {
	margin-left: 0 !important;
	margin-right: 0 !important;
}

/* =Visibility
-------------------------------------------------------------- */
.hidden {
    visibility: hidden;
}

.visible {
    visibility: visible;
}

.none {
    display: none;
}

.hide-desktop {
    display: none;
}

.show-desktop {
    display: block;
}

/* =Responsive Images
-------------------------------------------------------------- */
img {
    -ms-interpolation-mode: bicubic;
    border: 0;
	height: auto;
	max-width: 100%;
    vertical-align: middle;
}

.ie8 img {
    height: auto; 
    width: auto\9; 
}

.ie8 img.size-large {
	max-width: 60%;
	width: auto;
}

/* =Responsive Embeds/Objects
-------------------------------------------------------------- */
embed,
object {
	max-width: 100%;
}

svg:not(:root) {
    overflow: hidden;
}

/* =Links
-------------------------------------------------------------- */
a {
	color: #06c;
	font-weight: 400;
	text-decoration: none;
}

a:hover,
a:focus,
a:active {
	color: #444;
    outline: 0;
	text-decoration: none;
}

::selection {

    color: #fff;
	text-shadow: none;
}

/* =Forms
-------------------------------------------------------------- */
label {
	display: inline-block;
	font-weight: 700;
	padding: 2px 0;
}

legend {
	padding: 2px 5px;
}

fieldset {
	border: 1px solid #ccc;
	margin: 0 0 1.5em;
	padding: 1em 2em;
}

select,
input[type="text"], 
input[type="password"] {
    -moz-box-sizing: border-box;
	-moz-border-radius: 2px;
	-webkit-box-sizing: border-box;
	-webkit-border-radius: 2px;
	-webkit-box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
	box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
	background-color: #fff;
	box-sizing: border-box;
	border: 1px solid #aaa;
	border-bottom-color: #ccc;
	border-radius: 2px;
	margin: 0;
	outline: none;
	padding: 6px 8px;
	vertical-align: middle;
	width: 100%;
}

select {
	height: auto;
	width: 100%;
}

area,
textarea {
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-webkit-border-radius: 2px;
	-webkit-box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
    background-color: #fff;
	box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
	box-sizing: border-box;
	border: 1px solid #aaa;
	border-bottom-color: #ccc;
	border-radius: 2px;
	height: auto;
	overflow: auto;
	margin: 0;
	outline: none;
	padding: 8px 10px;
	width: 100%;
}

input, 
select {
	cursor: pointer;
}

area:focus,
input:focus, 
textarea:focus {
    border: 1px solid #6cf;
}

input[type='text'], 
input[type='password'] {
	cursor: text;
}

/* =IE Forms
-------------------------------------------------------------- */
.ie7 area,
.ie7 select,
.ie7 textarea,
.ie7 input[type="text"], 
.ie7 input[type="password"] {
    width: 96%;
}

/* =Buttons
-------------------------------------------------------------- */
button, 
a.button,
input[type='reset'], 
input[type='button'], 
input[type='submit'] {
	-moz-border-radius: 2px;
    -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset;
    -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset;
	-webkit-border-radius: 2px;
	background-color: #f9f9f9; /* Alabaster */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#f9f9f9), to(#f1f1f1));
	background-image: -webkit-linear-gradient(top, #f9f9f9, #f1f1f1);
	background-image: -moz-linear-gradient(top, #f9f9f9, #f1f1f1);
	background-image: -ms-linear-gradient(top, #f9f9f9, #f1f1f1);
	background-image: -o-linear-gradient(top, #f9f9f9, #f1f1f1);
	background-image: linear-gradient(top, #f9f9f9, #f1f1f1);
	box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset;
	border: 1px solid #ddd;
	border-radius: 2px;
	color: #333;
	cursor: pointer;
	display: inline-block;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#f9f9f9, endColorstr=#f1f1f1);
	font-size: 14px;
	font-weight: 700;
    line-height: 20px;
	margin: 0;
	padding: 4px 10px;
	text-decoration: none;
	text-shadow: 0 1px 0 #fff;
	vertical-align: middle;
	white-space: nowrap;
}

button:hover, 
a.button:hover,
input[type='reset']:hover, 
input[type='button']:hover, 
input[type='submit']:hover {
    -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset;
    -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset;
	background-color: #fff;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#f1f1f1));
	background-image: -webkit-linear-gradient(top, #fff, #f1f1f1);
	background-image: -moz-linear-gradient(top, #fff, #f1f1f1);
	background-image: -ms-linear-gradient(top, #fff, #f1f1f1);
	background-image: -o-linear-gradient(top, #fff, #f1f1f1);
	background-image: linear-gradient(top, #fff, #f1f1f1);
	border: 1px solid #ddd;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset;
	color: #333;
}

button:active, 
a.button:active,
input[type='reset']:active, 
input[type='button']:active, 
input[type='submit']:active {
    -moz-box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.1);
	background-color: #f9f9f9;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#f9f9f9), to(#f1f1f1));
	background-image: -webkit-linear-gradient(top, #f9f9f9, #f1f1f1);
	background-image: -moz-linear-gradient(top, #f9f9f9, #f1f1f1);
	background-image: -ms-linear-gradient(top, #f9f9f9, #f1f1f1);
	background-image: -o-linear-gradient(top, #f9f9f9, #f1f1f1);
	background-image: linear-gradient(top, #f9f9f9, #f1f1f1);
    box-shadow: 0 1px 0 #fff, inset 0 1px 1px rgba(0, 0, 0, 0.1);
}

/* =Buttons (Call to Action)
-------------------------------------------------------------- */
.call-to-action {
	text-align: center;
}

.call-to-action a.button {
	font-size: 24px;
	padding: 15px 35px;
}

.call-to-action a.button:hover {
	text-decoration: none;
}

.ie7 .call-to-action a.button {
    padding: 11px 35px 19px 35px;
}

/* =Buttons (Sizes)
-------------------------------------------------------------- */
.small a.button {
	font-size: 10px;
	padding: 3px 6px;
}

.medium a.button {
	font-size: 16px;
	padding: 8px 16px;
}

.large a.button {
	font-size: 18px;
	padding: 10px 35px;
}

.xlarge a.button {
	font-size: 24px;
	padding: 12px 55px;
}

/* =Buttons (Colors)
-------------------------------------------------------------- */
a.blue {
	background-color: #1874cd; /* Dodger Blue */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#4f9eea), to(#1874cd));
	background-image: -webkit-linear-gradient(top, #4f9eea, #1874cd);
	background-image: -moz-linear-gradient(top, #4f9eea, #1874cd);
	background-image: -ms-linear-gradient(top, #4f9eea, #1874cd);
	background-image: -o-linear-gradient(top, #4f9eea, #1874cd);
	background-image: linear-gradient(top, #4f9eea, #1874cd);
	border: 1px solid #115290;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#4f9eea, endColorstr=#1874cd);
	text-shadow: 0 -1px 0 #115290;
}

a.blue:hover {
	background-color: #7db7f0;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#7db7f0), to(#1874cd));
	background-image: -webkit-linear-gradient(top, #7db7f0, #1874cd);
	background-image: -moz-linear-gradient(top, #7db7f0, #1874cd);
	background-image: -ms-linear-gradient(top, #7db7f0, #1874cd);
	background-image: -o-linear-gradient(top, #7db7f0, #1874cd);
	background-image: linear-gradient(top, #7db7f0, #1874cd);
	border: 1px solid #115290;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#7db7f0, endColorstr=#1874cd);
	text-shadow: 0 -1px 0 #115290;
}

a.red {
	background-color: #cd0000; /* Red 4 */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#ff2323), to(#cd0000));
	background-image: -webkit-linear-gradient(top, #ff2323, #cd0000);
	background-image: -moz-linear-gradient(top, #ff2323, #cd0000);
	background-image: -ms-linear-gradient(top, #ff2323, #cd0000);
	background-image: -o-linear-gradient(top, #ff2323, #cd0000);
	background-image: linear-gradient(top, #ff2323, #cd0000);
	border: 1px solid #890000;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ff2323, endColorstr=#cd0000);
	text-shadow: 0 -1px 0 #890000;
}

a.red:hover {
	background-color: #ff5656;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#ff5656), to(#cd0000));
	background-image: -webkit-linear-gradient(top, #ff5656, #cd0000);
	background-image: -moz-linear-gradient(top, #ff5656, #cd0000);
	background-image: -ms-linear-gradient(top, #ff5656, #cd0000);
	background-image: -o-linear-gradient(top, #ff5656, #cd0000);
	background-image: linear-gradient(top, #ff5656, #cd0000);
	border: 1px solid #890000;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ff5656, endColorstr=#cd0000);
	text-shadow: 0 -1px 0 #890000;
}

a.orange {
	background-color: #ff7f00; /* Dark Orange 1 */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#fa5), to(#ff7f00));
	background-image: -webkit-linear-gradient(top, #fa5, #ff7f00);
	background-image: -moz-linear-gradient(top, #fa5, #ff7f00);
	background-image: -ms-linear-gradient(top, #fa5, #ff7f00);
	background-image: -o-linear-gradient(top, #fa5, #ff7f00);
	background-image: linear-gradient(top, #fa5, #ff7f00);
	border: 1px solid #bb5d00;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffaa55, endColorstr=#ff7f00);
	text-shadow:0 -1px 0 #bb5d00;
}

a.orange:hover {
	background-color: #ffc388;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#ffc388), to(#ff7f00));
	background-image: -webkit-linear-gradient(top, #ffc388, #ff7f00);
	background-image: -moz-linear-gradient(top, #ffc388, #ff7f00);
	background-image: -ms-linear-gradient(top, #ffc388, #ff7f00);
	background-image: -o-linear-gradient(top, #ffc388, #ff7f00);
	background-image: linear-gradient(top, #ffc388, #ff7f00);
	border: 1px solid #bb5d00;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffc388, endColorstr=#ff7f00);
	text-shadow:0 -1px 0 #bb5d00;
}

a.yellow {
	background-color: #ecca06; /* Yellow Gold */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#fff2aa), to(#ffd700));
	background-image: -webkit-linear-gradient(top, #fff2aa, #ffd700);
	background-image: -moz-linear-gradient(top, #fff2aa, #ffd700);
	background-image: -ms-linear-gradient(top, #fff2aa, #ffd700);
	background-image: -o-linear-gradient(top, #fff2aa, #ffd700);
	background-image: linear-gradient(top, #fff2aa, #ffd700);
	border: 1px solid #bb9e00;
	color: #161300;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#fff2aa, endColorstr=#ffd700);
	text-shadow:0 1px 0 #fff;
}

a.yellow:hover {
	background-color: #fffadd;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#fffadd), to(#ffd700));
	background-image: -webkit-linear-gradient(top, #fffadd, #ffd700);
	background-image: -moz-linear-gradient(top, #fffadd, #ffd700);
	background-image: -ms-linear-gradient(top, #fffadd, #ffd700);
	background-image: -o-linear-gradient(top, #fffadd, #ffd700);
	background-image: linear-gradient(top, #fffadd, #ffd700);
	border: 1px solid #bb9e00;
	color: #161300;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#fffadd, endColorstr=#ffd700);
	text-shadow:0 1px 0 #fff;
}

a.green {
	background-color: #2e8b57; /* Sea Green 4 */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#4bc380), to(#2e8b57));
	background-image: -webkit-linear-gradient(top, #4bc380, #2e8b57);
	background-image: -moz-linear-gradient(top, #4bc380, #2e8b57);
	background-image: -ms-linear-gradient(top, #4bc380, #2e8b57);
	background-image: -o-linear-gradient(top, #4bc380, #2e8b57);
	background-image: linear-gradient(top, #4bc380, #2e8b57);
	border: 1px solid #1d5837;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#4bc380, endColorstr=#2e8b57);
	text-shadow: 0 -1px 0 #1d5837;
}

a.green:hover {
	background-color: #71d09b;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#71d09b), to(#2e8b57));
	background-image: -webkit-linear-gradient(top, #71d09b, #2e8b57);
	background-image: -moz-linear-gradient(top, #71d09b, #2e8b57);
	background-image: -ms-linear-gradient(top, #71d09b, #2e8b57);
	background-image: -o-linear-gradient(top, #71d09b, #2e8b57);
	background-image: linear-gradient(top, #71d09b, #2e8b57);
	border: 1px solid #1d5837;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#71d09b, endColorstr=#2e8b57);
	text-shadow: 0 -1px 0 #1d5837;
}

a.olive {
	background-color: #838b83; /* Honey Dew 4 */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#e0e000), to(#838b83));
	background-image: -webkit-linear-gradient(top, #afb4af, #838b83);
	background-image: -moz-linear-gradient(top, #afb4af, #838b83);
	background-image: -ms-linear-gradient(top, #afb4af, #838b83);
	background-image: -o-linear-gradient(top, #afb4af, #838b83);
	background-image: linear-gradient(top, #afb4af, #838b83);
	border: 1px solid #626862;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#afb4af, endColorstr=#838b83);
	text-shadow: 0 -1px 0 #626862;
}

a.olive:hover {
	background-color: #c9cdc9;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#c9cdc9), to(#838b83));
	background-image: -webkit-linear-gradient(top, #c9cdc9, #838b83);
	background-image: -moz-linear-gradient(top, #c9cdc9, #838b83);
	background-image: -ms-linear-gradient(top, #c9cdc9, #838b83);
	background-image: -o-linear-gradient(top, #c9cdc9, #838b83);
	background-image: linear-gradient(top, #c9cdc9, #838b83);
	border: 1px solid #626862;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#c9cdc9, endColorstr=#838b83);
	text-shadow: 0 -1px 0 #626862;
}

a.purple {
	background-color: #5d478b; /* Medium Purple 4 */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#8771b6), to(#5d478b));
	background-image: -webkit-linear-gradient(top, #8771b6, #5d478b);
	background-image: -moz-linear-gradient(top, #8771b6, #5d478b);
	background-image: -ms-linear-gradient(top, #8771b6, #5d478b);
	background-image: -o-linear-gradient(top, #8771b6, #5d478b);
	background-image: linear-gradient(top, #8771b6, #5d478b);
	border: 1px solid #3f305e;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#8771b6, endColorstr=#5d478b);
	text-shadow: 0 -1px 0 #3f305e;
}

a.purple:hover {
	background-color: #a492c8;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#a492c8), to(#5d478b));
	background-image: -webkit-linear-gradient(top, #a492c8, #5d478b);
	background-image: -moz-linear-gradient(top, #a492c8, #5d478b);
	background-image: -ms-linear-gradient(top, #a492c8, #5d478b);
	background-image: -o-linear-gradient(top, #a492c8, #5d478b);
	background-image: linear-gradient(top, #a492c8, #5d478b);
	border: 1px solid #3f305e;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#a492c8, endColorstr=#5d478b);
	text-shadow: 0 -1px 0 #3f305e;
}

a.pink {
	background-color: #cd1076; /* Deep Pink 3 */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#f042a0), to(#cd1076));
	background-image: -webkit-linear-gradient(top, #f042a0, #cd1076);
	background-image: -moz-linear-gradient(top, #f042a0, #cd1076);
	background-image: -ms-linear-gradient(top, #f042a0, #cd1076);
	background-image: -o-linear-gradient(top, #f042a0, #cd1076);
	background-image: linear-gradient(top, #f042a0, #cd1076);
	border: 1px solid #8e0b52;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#f042a0, endColorstr=#cd1076);
	text-shadow: 0 -1px 0 #8e0b52;
}

a.pink:hover {
	background-color: #f471b8;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#f471b8), to(#cd1076));
	background-image: -webkit-linear-gradient(top, #f471b8, #cd1076);
	background-image: -moz-linear-gradient(top, #f471b8, #cd1076);
	background-image: -ms-linear-gradient(top, #f471b8, #cd1076);
	background-image: -o-linear-gradient(top, #f471b8, #cd1076);
	background-image: linear-gradient(top, #f471b8, #cd1076);
	border: 1px solid #8e0b52;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#f471b8, endColorstr=#cd1076);
	text-shadow: 0 -1px 0 #8e0b52;
}

a.brick {
	background-color: #b22222; /* Fire Brick */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#dd4c4c), to(#b22222));
	background-image: -webkit-linear-gradient(top, #dd4c4c, #b22222);
	background-image: -moz-linear-gradient(top, #dd4c4c, #b22222);
	background-image: -ms-linear-gradient(top, #dd4c4c, #b22222);
	background-image: -o-linear-gradient(top, #dd4c4c, #b22222);
	background-image: linear-gradient(top, #dd4c4c, #b22222);
	border: 1px solid #791717;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#dd4c4c, endColorstr=#b22222);
	text-shadow: 0 -1px 0 #791717;
}

a.brick:hover {
	background-color: #e57777;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#e57777), to(#b22222));
	background-image: -webkit-linear-gradient(top, #e57777, #b22222);
	background-image: -moz-linear-gradient(top, #e57777, #b22222);
	background-image: -ms-linear-gradient(top, #e57777, #b22222);
	background-image: -o-linear-gradient(top, #e57777, #b22222);
	background-image: linear-gradient(top, #e57777, #b22222);
	border: 1px solid #791717;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#e57777, endColorstr=#b22222);
	text-shadow: 0 -1px 0 #791717;
}

a.gold {
	background-color: #8b6508; /* Dark Golden Rod 4 */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#db9f0d), to(#8b6508));
	background-image: -webkit-linear-gradient(top, #db9f0d, #8b6508);
	background-image: -moz-linear-gradient(top, #db9f0d, #8b6508);
	background-image: -ms-linear-gradient(top, #db9f0d, #8b6508);
	background-image: -o-linear-gradient(top, #db9f0d, #8b6508);
	background-image: linear-gradient(top, #db9f0d, #8b6508);
	border: 1px solid #6b4e06;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#db9f0d, endColorstr=#8b6508);
	text-shadow: 0 -1px 0 #6b4e06;
}

a.gold:hover {
	background-color: #f3b828;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#f3b828), to(#8b6508));
	background-image: -webkit-linear-gradient(top, #f3b828, #8b6508);
	background-image: -moz-linear-gradient(top, #f3b828, #8b6508);
	background-image: -ms-linear-gradient(top, #f3b828, #8b6508);
	background-image: -o-linear-gradient(top, #f3b828, #8b6508);
	background-image: linear-gradient(top, #f3b828, #8b6508);
	border: 1px solid #6b4e06;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#f3b828, endColorstr=#8b6508);
	text-shadow: 0 -1px 0 #6b4e06;
}

a.brown {
	background-color: #8b4513; /* Saddle Brown */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#d66a1d), to(#8b4513));
	background-image: -webkit-linear-gradient(top, #d66a1d, #8b4513);
	background-image: -moz-linear-gradient(top, #d66a1d, #8b4513);
	background-image: -ms-linear-gradient(top, #d66a1d, #8b4513);
	background-image: -o-linear-gradient(top, #d66a1d, #8b4513);
	background-image: linear-gradient(top, #d66a1d, #8b4513);
	border: 1px solid #4f270b;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#d66a1d, endColorstr=#8b4513);
	text-shadow: 0 -1px 0 #4f270b;
}

a.brown:hover {
	background-color: #8b4513;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#e58541), to(#8b4513));
	background-image: -webkit-linear-gradient(top, #e58541, #8b4513);
	background-image: -moz-linear-gradient(top, #e58541, #8b4513);
	background-image: -ms-linear-gradient(top, #e58541, #8b4513);
	background-image: -o-linear-gradient(top, #e58541, #8b4513);
	background-image: linear-gradient(top, #e58541, #8b4513);
	border: 1px solid #4f270b;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#e58541, endColorstr=#8b4513);
	text-shadow: 0 -1px 0 #4f270b;
}

a.silver {
	background-color: #c0c0c0; /* Silver */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#eaeaea), to(#c0c0c0));
	background-image: -webkit-linear-gradient(top, #eaeaea, #c0c0c0);
	background-image: -moz-linear-gradient(top, #eaeaea, #c0c0c0);
	background-image: -ms-linear-gradient(top, #eaeaea, #c0c0c0);
	background-image: -o-linear-gradient(top, #eaeaea, #c0c0c0);
	background-image: linear-gradient(top, #eaeaea, #c0c0c0);
	border: 1px solid #9e9e9e;
	color: #444;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#eaeaea, endColorstr=#c0c0c0);
	text-shadow: 0 1px 0 #fff;
}

a.silver:hover {
	background-color: #fff;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#c0c0c0));
	background-image: -webkit-linear-gradient(top, #fff, #c0c0c0);
	background-image: -moz-linear-gradient(top, #fff, #c0c0c0);
	background-image: -ms-linear-gradient(top, #fff, #c0c0c0);
	background-image: -o-linear-gradient(top, #fff, #c0c0c0);
	background-image: linear-gradient(top, #fff, #c0c0c0);
	border: 1px solid #9e9e9e;
	color: #444;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffff, endColorstr=#c0c0c0);
	text-shadow: 0 1px 0 #fff;
}

a.gray {
	background-color: #696969; /* Dim Gray */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#939393), to(#696969));
	background-image: -webkit-linear-gradient(top, #939393, #696969);
	background-image: -moz-linear-gradient(top, #939393, #696969);
	background-image: -ms-linear-gradient(top, #939393, #696969);
	background-image: -o-linear-gradient(top, #939393, #696969);
	background-image: linear-gradient(top, #939393, #696969);
	border: 1px solid #474747;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#939393, endColorstr=#696969);
	text-shadow: 0 -1px 0 #474747;
}

a.gray:hover {
	background-color: #adadad;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#adadad), to(#696969));
	background-image: -webkit-linear-gradient(top, #adadad, #696969);
	background-image: -moz-linear-gradient(top, #adadad, #696969);
	background-image: -ms-linear-gradient(top, #adadad, #696969);
	background-image: -o-linear-gradient(top, #adadad, #696969);
	background-image: linear-gradient(top, #adadad, #696969);
	border: 1px solid #474747;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#adadad, endColorstr=#696969);
	text-shadow: 0 -1px 0 #474747;
}

a.black {
	background-color: #080808; /* Black */
	background-image: -webkit-gradient(linear, left top, left bottom, from(#323232), to(#080808));
	background-image: -webkit-linear-gradient(top, #323232, #080808);
	background-image: -moz-linear-gradient(top, #323232, #080808);
	background-image: -ms-linear-gradient(top, #323232, #080808);
	background-image: -o-linear-gradient(top, #323232, #080808);
	background-image: linear-gradient(top, #323232, #080808);
	border: 1px solid #000;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#323232, endColorstr=#080808);
	text-shadow: 0 -1px 0 #000;
}

a.black:hover {
	background-color: #4c4c4c;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#4c4c4c), to(#080808));
	background-image: -webkit-linear-gradient(top, #4c4c4c, #080808);
	background-image: -moz-linear-gradient(top, #4c4c4c, #080808);
	background-image: -ms-linear-gradient(top, #4c4c4c, #080808);
	background-image: -o-linear-gradient(top, #4c4c4c, #080808);
	background-image: linear-gradient(top, #4c4c4c, #080808);
	border: 1px solid #000;
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#4c4c4c, endColorstr=#080808);
	text-shadow: 0 -1px 0 #000;
}

/* =Info Boxes
-------------------------------------------------------------- */
.info-box {
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	display: block;
	margin: 20px 0;
	padding: 15px;
	text-align: left;
}

.alert {
	background-color: #faebeb;
	border: 1px solid #dc7070;
	color: #212121;
}

.address {
	background-color: #f6f5ef;
	border: 1px solid #cdc9a5;
	color: #212121;
}

.notice {
	background-color: #fbf9e9;
	border: 1px solid #e3cf57;
	color: #212121;
}

.success {
	background-color: #f9fde8;
	border: 1px solid #a2bc13;
	color: #212121;
}

.download {
	background-color: #fff4e5;
	border: 1px solid #ff9912;
	color: #212121;
}

.information {
	background-color: #eef3f6;
	border: 1px solid #6ca6cd;
	color: #212121;
}

.required {
	color: #d5243f;
}

/* =IE6 Notice
-------------------------------------------------------------- */
.msie-box {
	background-color: #f9edbe;
	border: 1px solid #f0c36d;
	color: #212121;
	display: block;
	margin: 0 auto;
	max-width: 960px;
	padding: 10px;
	position: absolute;
	top: 60px;
	text-align: center;
	width: 100%;
}

.msie-box a {
	color: #212121;
}

/* =Tables
-------------------------------------------------------------- */
th, 
td,
table {
	border: 1px solid #ddd;
}

table {
	border-collapse: collapse;
	width: 100%;
}

/* =Lists
-------------------------------------------------------------- */
ul {
	list-style-type: disc;
    margin: 0;
    padding: 0;
}

ol {
	line-height: 22px;
	list-style-position: outside;
	list-style-type: decimal;
    margin: 0;
    padding: 0;
}

dt {
	font-weight: 400;
}

/* =Blockquote
-------------------------------------------------------------- */
blockquote {
	background: #f9f9f9;
	border: none;
	border-left: 4px solid #d6d6d6;
	margin: 20px;
	overflow: auto;
	padding: 0 0 10px 12px;
}

blockquote p {
	font-family: 'Georgia', 'Times New Roman', Times, serif;
	font-style: italic;
	font-size: 18px;
	line-height: 26px;
}

/* =Headings
-------------------------------------------------------------- */
h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
	font-weight: 700;
	line-height: 1.0em;
    word-wrap: break-word;
}

h1 {
    font-size: 2.625em; /* = 42px */
    margin-bottom: .5em;
    margin-top: .5em;
}

h2 {
    font-size: 2.250em; /* = 36px */
    margin-bottom: .75em;
    margin-top: .75em;
}

h3 {
    font-size: 1.875em; /* = 30px */
    margin-bottom: .857em;
    margin-top: .857em;
}

h4 {
    font-size: 1.500em; /* = 24px */
    margin-bottom: 1em;
    margin-top: 1em;
}

h5 {
    font-size: 1.125em; /* = 18px */
    margin-bottom: 1.125em;
    margin-top: 1.125em;
}

h6 {
    font-size: 1.000em; /* = 16px */
    margin-bottom: 1.285em;
    margin-top: 1.285em;
}

/* =Margins & Paddings
-------------------------------------------------------------- */
p, 
hr, 
dl, 
pre,
form,
table,
address, 
blockquote {
	margin: 1.6em 0;
}

th, td {
	padding: .8em;
}

caption {
	padding-bottom: .8em;
}

blockquote {
	padding: 0 1em;
}

blockquote:first-child {
	margin: .8em 0;
}

fieldset {
	margin: 1.6em 0;
	padding: 0 1em 1em;
}

legend {
	padding-left: .8em;
	padding-right: .8em;
}

legend+* {
	margin-top: 1em;
}

input,
textarea {
	padding: .3em .4em .15em;
}

select {
	padding: .1em .2em 0;
}

option {
	padding: 0 .4em;
}

dt {
	margin-bottom: .4em;
	margin-top: .8em;
}


ul {
    list-style-type: disc;
}

ol {
    list-style-type: decimal;
}

ul,
ol {
    margin: 0 1.5em 1.5em 0;
    padding-left: 2.0em;
}

li ul,
li ol {
    margin: 0;
}

form div {
	margin-bottom: .8em;
}

/* =Globals
-------------------------------------------------------------- */
#container {
	margin: 0 auto;
	max-width: 960px;
	padding: 0px 25px;
}

#wrapper {
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	background-color: #fff;
	border: 1px solid #e5e5e5;
	border-radius: 4px;
	clear: both;
	margin: 20px auto 20px auto;
	padding: 0 20px 20px 20px;
	position: relative;
}

.home #wrapper {
	background-color: transparent;
	border: none;
	margin: 20px auto 20px auto;
	padding: 0;
}

#header {
	margin: 0;
}

#footer {
	clear: both;
	margin: 0 auto;
	max-width: 960px;
	padding: 0 25px 0 25px;
}

#footer-wrapper {
	margin: 0;
	padding: 0;
}

/* =Header
-------------------------------------------------------------- */
#logo {
	float: left;
	margin: 0;
}

.site-name {
	display: block;
	font-size: 2.063em; /* = 33px */
    line-height: 1.0em;
	padding-top: 20px;
}

.site-name a {
    color: #333;
	font-weight: 700;
}

.site-description {
    color: #afafaf;
	display: block;
	font-size: 0.875em; /* = 14px */
	margin: 10px 0;
}

/* =Content
-------------------------------------------------------------- */
#content {
	margin-bottom: 20px;
}

#content-full {
	margin-bottom: 20px;
}

#content-blog {
	margin-bottom: 20px;
}

#content-images {
	margin-bottom: 20px;
}

#content-search {
    margin-bottom: 20px;
    margin-top: 20px;
}

#content-archive {
	margin-bottom: 20px;
}

#content-sitemap {
	margin-bottom: 20px;
}

#content-sitemap a {
	font-size: 12px;
}

#content .sticky {
	clear: both;
}

#content .sticky p {}

/* =Templates (Landing Page)
-------------------------------------------------------------- */
.page-template-landing-page-php .menu, 
.page-template-landing-page-php .top-menu,
.page-template-landing-page-php .tinynav,
.page-template-landing-page-php .footer-menu, 
.page-template-landing-page-php .sub-header-menu {
	display: none;
}

/* =Author Meta (Author's Box)
-------------------------------------------------------------- */
#author-meta {
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
	background: #f9f9f9;
	border: 1px solid #d6d6d6;
    border-radius: 4px;
	clear: both;
	display: block;
	margin: 30px 0 40px 0;
    padding: 10px;
	overflow: hidden;
}

#author-meta img {
	float: left;
	padding: 10px 15px 0 5px;
}

#author-meta p {
    margin: 0;
	padding: 5px;
}

#author-meta .about-author {
	font-weight: 700;
	margin: 10px 0 0 0;
}

/* =Featured Content
-------------------------------------------------------------- */
#featured {
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	background-color: #fff;
	border: 1px solid #e5e5e5;
	border-radius: 4px;
	padding-bottom: 40px;
	width: 99.893617021277%;
}

#featured p {
	font-size: 18px;
	font-weight: 200;
	line-height: 27px;
	padding: 0 40px 0 40px;
	text-align: center;
}

#featured-image {
	margin: 40px 0 0 0;
}

#featured-image .fluid-width-video-wrapper {
	margin-left: -20px;
}

.featured-image img {
	margin-top: 44px;
}

/* =Post
-------------------------------------------------------------- */
.comments-link {
	font-size: 12px;
}

#cancel-comment-reply-link {
	color: #900;
}

.post-data {
	clear: both;
	font-size: 12px;
	font-weight: 700;
	margin-top: 20px;
}

.post-data a {
	color: #111;
}

.post-entry {
	clear: both;
}

.post-meta {
	clear: both;
	color: #9f9f9f;
	font-size: 12px;
	margin-bottom: 10px;
}

.post-edit {
	clear: both;
	display: block;
	font-size: 12px;
	margin: 1.5em 0;
}

.post-search-terms {
	clear: both;
}

.read-more {
	clear: both;
	font-weight: 700;
}

.attachment-entry {
	clear: both;
	text-align: center;
}

/* =bbPress
    bbPress has its own breadcrumb lists
-------------------------------------------------------------- */
.bbPress .breadcrumb-list {
	display: none;
}

/* =Symbols
-------------------------------------------------------------- */
.ellipsis {
	color: #aaa;
	font-size: 18px;
	margin-left: 5px;
}

.form-allowed-tags {
    display: none;
	font-size: 10px;
}

/* =Widgets
-------------------------------------------------------------- */
.widget-wrapper {
	-webkit-border-radius: 4px;
    -moz-border-radius: 4px;
	background-color: #f9f9f9;
	border: 1px solid #e5e5e5;
	border-radius: 4px;
	margin: 0 0 20px;
	padding: 20px;
}

.widget-wrapper select,
.widget-wrapper input[type="text"], 
.widget-wrapper input[type="password"] {
    width: 75%;
}

#widgets {
	margin-top: 40px;
}

.home #widgets {
	margin-top: 0;
}

#widgets a {
	display: inline-block;
	margin: 0;
	padding: 0;
	text-decoration: none;
}

#widgets form {
    margin: 0;
}

#widgets ul,
#widgets ol {
    padding: 0 0 0 20px;
}

#widgets ul li a {
	display: inline;
	text-decoration: none;
}

#widgets .widget-title img {
	float: right;
	height: 11px;
	position: relative;
	top: 4px;
	width: 11px;
}

#widgets .rss-date {
	line-height: 18px;
	padding: 6px 12px;
}

#widgets .rssSummary {
	padding: 10px;
}

#widgets cite {
	font-style: normal;
	line-height: 18px;
	padding: 6px 12px;
}

#widgets .tagcloud,
#widgets .textwidget {
	display: block;
	line-height: 1.5em;
	margin: 0;
	word-wrap: break-word;
}

#widgets .textwidget a {
	display: inline;
}

#widgets ul .children {
	padding: 0 0 0 10px;
}

#widgets .author {
	font-weight: 700;
	padding-top: 4px;
}

.widget_archive select, #cat {
	display: block;
	margin: 0 15px 0 0;
}

#colophon-widget ul {}

.colophon-widget {
	background: none;
	min-height: 0;
}

.colophon-widget select,
.colophon-widget input[type="text"], 
.colophon-widget input[type="password"] {
	width: 100%;
}

#top-widget {}

.top-widget {
    background: none;
    border: none;
    clear: right;
    float: right;
	min-height:0;
    padding: 0 3px 0 0;
    text-align: right;
    width: 45%;
}

.top-widget ul {
    padding: 0;
}

.top-widget select, 
.top-widget input[type="text"], 
.top-widget input[type="password"] {
    width: auto;
}

.top-widget #searchform {
    margin: 0;
}

/* =Titles
-------------------------------------------------------------- */
.featured-title {
	font-size:  60px;
	letter-spacing: -1px;
	margin: 0;
	padding-top: 40px;
	text-align: center;
}

.featured-subtitle {
	padding: 0 10px;
	text-align: center;
}

.widget-title, 
.widget-title-home h3 {
	display: block;
	font-size: 24px;
	font-weight: 700;
	line-height: 23px;
	margin: 0;
	padding: 0 0 20px 0;
	text-align: left;
}

.top-widget .widget-title {
    font-size: 14px;
    padding: 0;
    text-align: right;
}

.widget-title a {
	border-bottom: none;
	padding: 0 !important;
}

.title-404 {
	color: #933;
}

/* =404 Page 
-------------------------------------------------------------- */
.error404 select, 
.error404 input[type="text"], 
.error404 input[type="password"] {
    width: auto;
}

/* =Top Menu
-------------------------------------------------------------- */
.top-menu {
	float: right;
	margin: 10px 0;
    padding: 0;
}

.top-menu li {
	display: inline;
	list-style-type: none;
}

.top-menu li a {
	border-left: 1px solid #ccc;
	color: #333;
	font-size: 11px;
	padding: 0 4px 0 8px;
}

.top-menu > li:first-child > a {
	border-left: none;
}

.top-menu li a:hover {
	color: #333;
}

/* =Header Menu (Primary)
-------------------------------------------------------------- */
.menu {
	background-color: #585858;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#585858), to(#3d3d3d));
	background-image: -webkit-linear-gradient(top, #585858, #3d3d3d);
	background-image: -moz-linear-gradient(top, #585858, #3d3d3d);
	background-image: -ms-linear-gradient(top, #585858, #3d3d3d);
	background-image: -o-linear-gradient(top, #585858, #3d3d3d);
	background-image: linear-gradient(top, #585858, #3d3d3d);
	clear: both;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#585858, endColorstr=#3d3d3d);
	margin: 0 auto;
}

.menu, 
.menu ul {
	display: block;
	list-style-type: none;
	margin: 0;
	padding: 0;
}

.menu li {
	border: 0;
	display: block;
	float: left;
	margin: 0;
	padding: 0;
	position: relative;
	z-index: 5;
}

.menu li:hover {
	white-space: normal;
	z-index: 10000;
}

.menu li li {
	float: none;
}

.menu ul {
	left: 0;
	position: absolute;
	top: 0;
	visibility: hidden;
	z-index: 10;
}

.menu li:hover > ul {
	top: 100%;
	visibility: visible;
}

.menu li li:hover > ul {
	left: 100%;
	top: 0;
}

.menu:after, 
.menu ul:after {
	clear: both;
	content: '.';
	display: block;
	height: 0;
	overflow: hidden;
	visibility: hidden;
}

.menu, 
.menu ul {
	min-height: 0;
}

.menu ul,
.menu ul ul {
	margin: 0;
	padding: 0;
}

.menu ul li a:hover, 
.menu li li a:hover {
	color: #484848;
	text-decoration: none;
}

.menu ul {
    margin-top: 1px;
	min-width: 15em;
	width: auto;
}

.menu a {
	border-left: 1px solid #585858;
	color: #fff;
    cursor: pointer;
	display: block;
	font-size: 13px;
	font-weight: 700;
	height: 45px;
	line-height: 45px;
	margin: 0;
	padding: 0 0.9em;
	position: relative;
	text-decoration: none;
	text-shadow: 0 -1px 0 #000;
}

.menu a:hover {
	background-color: #808080;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#808080), to(#363636));
	background-image: -webkit-linear-gradient(top, #808080, #363636);
	background-image: -moz-linear-gradient(top, #808080, #363636);
	background-image: -ms-linear-gradient(top, #808080, #363636);
	background-image: -o-linear-gradient(top, #808080, #363636);
	background-image: linear-gradient(top, #808080, #363636);
	color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#808080, endColorstr=#363636);
}

.menu .current_page_item a,
.menu .current-menu-item a {
	background-color: #343434;
}

.home .menu .current_page_item a {
    background: none;
	background-color: transparent;
    background-image: none;
    filter: none;
}

.menu li li {
	background: #fff;
	background-image: none;
	border: 1px solid #e5e5e5;
	color: #444;
	filter: none;
    margin: -1px 0 1px 0;
	width: auto;
}

.menu li li a {
	background: transparent !important;
	border: none;
	color: #444;
	font-size: 12px;
	font-weight: 400;
	height: auto;
	height: 20px;
	line-height: 20px;
	padding: 5px 10px;
	text-shadow: none;
	white-space: nowrap;
}

.menu li li a:hover {
	background: #f5f5f5 !important;
	background-image: none;
	border: none;
	color: #444;
	filter: none;
}

.menu ul > li + li {
	border-top: 0;
}

.menu li li:hover > ul {
	left: 100%;
	top: 0;
}

.menu > li:first-child > a {
	border-left: none;
}

/* =Primary Main Menu IE Fixes
-------------------------------------------------------------- */
.ie7 .menu ul {
	background: url(/web/20130916195846im_/http://gqlist.com/wp-content/themes/responsive/images/ie7-fix.gif) repeat;
}

.ie7 .menu li li a  {
    min-width: 100%;
}

/* =Responsive Menu
    TinyNav + SelectBox
-------------------------------------------------------------- */
.tinynav { 
    display: none 
}

.sb-holder {
	background-color: #3d3d3d;
    display: none;
    height: 30px;
    margin: 0 auto;
    position: relative;
    width: 100%;
}

.sb-holder:focus .sb-selector {}

.sb-selector {
    display: block;
    height: 30px;
    left: 0;
    line-height: 30px;
    outline: none;
    overflow: hidden;
    position: absolute;
    text-indent: 10px;
    top: 0;
    width: 100%;
}

.sb-selector:link,
.sb-selector:visited,
.sb-selector:hover {
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    outline: none;
    text-decoration: none;
    text-shadow: 0 -1px 0 #000;
}

.sb-toggle {
    background: url(/web/20130916195846im_/http://gqlist.com/wp-content/themes/responsive/images/select-icons.png) 0 6px no-repeat;
    display: block;
    height: 30px;
    outline: none;
    position: absolute;
    right: 0;
    top: 0;
    width: 30px;
}

.sb-toggle-open {
    background: url(/web/20130916195846im_/http://gqlist.com/wp-content/themes/responsive/images/select-icons.png) 0 -45px no-repeat;
}

.sb-holder-disabled {
    background-color: #3c3c3c;
    border: 1px solid #515151;
}

.sb-holder-disabled .sb-holder {}

.sb-holder-disabled .sb-toggle {}

.sb-options {
    background-color: #fff;
    list-style: none;
    left: 0;
    margin: 0;
    padding: 0;
    position: absolute;
    top: 30px;
    width: 100%;
    z-index: 1;
    overflow-y: auto;
}

.sb-options li {
    padding: 0;
}

.sb-options a {
    border-bottom: 1px solid #e5e5e5;
    display: block;
    font-size: 11px;
    outline: none;
    padding: 4px;
    text-indent: 4px;
}

.sb-options a:link,
.sb-options a:visited {
    color: #444;
    text-decoration: none;
}

.sb-options a:hover,
.sb-options a:focus,
.sb-options a.sb-focus {
    background-color: #f5f5f5;
    color: #444;
}

.sb-options li.last a {
    border-bottom: none;
}

.sb-options .sb-disabled {
    border-bottom: dotted 1px #515151;
    color: #999;
    display: block;
    padding: 7px 0 7px 3px;
}

.sb-options .sb-group {
    border-bottom: dotted 1px #515151;
    color: #ebb52d;
    display: block;
    font-weight: 700;
    padding: 7px 0 7px 3px;
}

.sb-options .sb-sub {
    padding-left: 17px;
}

/* =Sub-Header Menu
-------------------------------------------------------------- */
.sub-header-menu {
	background-color: #fff;
	border: 1px solid #e5e5e5;
	border-top: none;
	clear: both;
	margin: 0 auto;
}

.sub-header-menu, 
.sub-header-menu ul {
	display: block;
	list-style-type: none;
	margin: 0;
	padding: 0;
}

.sub-header-menu li {
	border: 0;
	display: block;
	float: left;
	margin: 0;
	padding: 0;
	position: relative;
	z-index: 5;
}

.sub-header-menu li:hover {
	white-space: normal;
	z-index: 10000;
}

.sub-header-menu li li {
	float: none;
}

.sub-header-menu ul {
	left: 0;
	position: absolute;
	top: 0;
	visibility: hidden;
	z-index: 10;
}

.sub-header-menu li:hover > ul {
	top: 100%;
	visibility: visible;
}

.sub-header-menu li li:hover > ul {
	left: 100%;
	top: 0;
}

.sub-header-menu:after, 
.sub-header-menu ul:after {
	clear: both;
	content: '.';
	display: block;
	height: 0;
	overflow: hidden;
	visibility: hidden;
}

.sub-header-menu, 
.sub-header-menu ul {
	min-height: 0;
}

.sub-header-menu ul,
.sub-header-menu ul ul {
	margin: 0;
	padding: 0;
}

.sub-header-menu ul li a:hover, 
.sub-header-menu li li a:hover {
	color: #484848;
	text-decoration: none;
}

.sub-header-menu ul {
    margin-top: 1px;
	min-width: 15em;
	width: auto;
}

.sub-header-menu a {
	border-left: 1px solid #e5e5e5;
	color: #333;
    cursor: pointer;
	display: block;
	font-size: 12px;
	font-weight: 400;
	height: 35px;
	line-height: 35px;
	margin: 0;
	padding: 0 0.9em;
	position: relative;
	text-decoration: none;
	text-shadow: none;
}

.sub-header-menu a:hover {
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-color: #f9f9f9;
	background-clip: padding-box;
}

.sub-header-menu .current_page_item a,
.sub-header-menu .current-menu-item a {
	background-color: #f9f9f9;
}

.sub-header-menu li li {
	background: #fff;
	background-image: none;
	border: 1px solid #e5e5e5;
	color: #444;
	filter: none;
    margin: -1px 0 1px 0;
	width: auto;
}

.sub-header-menu li li a {
	border: none;
	color: #444;
	font-size: 12px;
	font-weight: 400;
	height: auto;
	height: 20px;
	line-height: 20px;
	padding: 5px 10px;
	text-shadow: none;
}

.sub-header-menu li li a:hover {
	background: #f9f9f9;
	background-image: none;
	border: none;
	color: #444;
	filter: none;
}

.sub-header-menu ul > li + li {
	border-top: 0;
}

.sub-header-menu li li:hover > ul {
	left: 100%;
	top: 0;
}

.sub-header-menu > li:first-child > a {
	border-left: none;
}

.sub-header-menu ul.children a, 
.sub-header-menu .current_page_ancestor, 
.sub-header-menu .current_page_ancestor ul a {
	background: none;
	background-image: none;
	filter: none;
}

/* =Sub Header Menu IE Fixes
-------------------------------------------------------------- */
.ie7 .sub-header-menu ul {
	background: url(/web/20130916195846im_/http://gqlist.com/wp-content/themes/responsive/images/ie7-fix.gif) repeat;
}

.ie7 .sub-header-menu li li a  {
    min-width: 100%;
}

/* =Footer Menu
-------------------------------------------------------------- */
.footer-menu {
	margin-left: 0;
    padding: 0;
}

.footer-menu li {
	display: inline;
	list-style-type: none;
}

.footer-menu li a {
	border-left: 1px solid #ccc;
	color: #333;
	padding: 0 8px;
}

.footer-menu li a:hover {
	color: #222;
}

.footer-menu > li:first-child > a {
	border-left: none;
	padding: 0 8px 0 0;
}

/* =Navigation
-------------------------------------------------------------- */
.navigation {
	color: #111;
	display: block;
	font-size: 13px;
	height: 28px;
	line-height: 28px;
	margin: 20px 0;
	padding: 0 5px;
}

.navigation a {
	color: #aaa;
	padding: 4px 10px;
}

.navigation a:hover {
	color: #111;
	text-decoration: none;
}

.navigation .previous {
	float: left;
}

.navigation .next {
	float: right;
}

.navigation .bracket {
	font-size: 36px;
}

/* =Pagination (pages)
-------------------------------------------------------------- */
.pagination {
	clear: both;
	display: block;
	font-size: 16px;
	font-weight: 700;
	margin: 10px 0;
	padding: 5px 0;
}

.pagination a {
	text-decoration: none;
}

/* =Breadcrumb Lists
-------------------------------------------------------------- */
.breadcrumb-list {
	font-size: 12px;
	padding: 40px 0 0 0;
}

/* =Comments
-------------------------------------------------------------- */
#commentform {
	margin: 0;
}

.commentlist {
	border-bottom: 1px solid #e5e5e5;
	list-style: none;
	margin: 0;
	padding: 0;
}

.commentlist ol {
	list-style: decimal;
}

.commentlist li {
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	background-color: #fff;
	border-radius: 4px;
	margin: 0;
}

.commentlist .bypostauthor {}

.commentlist li cite {
	color: #111;
	font-size: 1.1em;
	font-style: normal;
	font-weight: 400;
}

.commentlist li.alt {
	background: #f9f9f9;
}

.commentlist .children {
	list-style: none;
	margin-left: 10px;
	padding: 10px;
}

.commentlist .avatar {
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
	float: left;
	margin-right: 10px;
	padding: 0;
	vertical-align: middle;
}

.comment-author .fn {
}

.comment-author .says {
	color: #999;
}

.comment-body .comment-meta {
	color: #999;
	display: inline-block;
	margin: 0;
	padding: 0;
	text-align: left;
}

.comment-body .comment-meta a {
	font-size: 11px;
}

.comment-body {
	clear: both;
	padding: 10px;
}

.comment-body p {
	clear: both;
}

.comment-body .reply {
}

.pingback, .trackback {
	list-style: none;
	margin: 20px 0;
}

.pingback cite, 
.trackback cite {
	font-style: normal;
}

#pings,
#comments {
	text-align: left;
}

#respond {
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	background-color: #eaeaea;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#eaeaea));
	background-image: -webkit-linear-gradient(top, #ffffff, #eaeaea);
	background-image: -moz-linear-gradient(top, #ffffff, #eaeaea);
	background-image: -ms-linear-gradient(top, #ffffff, #eaeaea);
	background-image: -o-linear-gradient(top, #ffffff, #eaeaea);
	background-image: linear-gradient(top, #ffffff, #eaeaea);
	border: 1px solid #ccc;
	border-bottom-color: #aaa;
	border-radius: 4px;
	clear: both;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffff, endColorstr=#eaeaea);
	margin-top: 15px;
	padding: 10px 20px 50px;
}

#respond label {
	display: inline;
}

.reply {
	margin: 10px 0;
}

.comment-form-url input,  
.comment-form-email input,
.comment-form-author input,
.comment-form-comment textarea {
	display: block;
}

.nocomments {
	color: #999;
	font-size: .9em;
	text-align: center;
}

/* =WordPress Core
-------------------------------------------------------------- */
.alignnone {
	margin: 5px 20px 20px 0;
}

.aligncenter, 
div.aligncenter {
	display: block;
	margin: 5px auto 20px auto;
}

.alignright {
	float: right;
	margin: 5px 0 20px 20px;
}

.alignleft {
	float: left;
	margin: 5px 20px 20px 0;
}

.aligncenter {
	display: block;
	margin: 5px auto;
}

a img.alignright {
	float: right;
	margin: 5px 0 20px 20px;
}

a img.alignnone {
	margin: 5px 20px 20px 0;
}

a img.alignleft {
	float: left;
	margin: 5px 20px 20px 0;
}

a img.aligncenter {
	display: block;
	margin-left: auto;
	margin-right: auto;
}

.wp-caption {
	background: #f9f9f9;
	border: 1px solid #f0f0f0;
	max-width: 96%;
	padding: 13px 10px 10px 10px;
	text-align: center;
}

.wp-caption.alignnone {
	margin: 5px 20px 20px 0;
}

.wp-caption.alignleft {
	margin: 5px 20px 20px 0;
}

.wp-caption.alignright {
	margin: 5px 0 20px 20px;
}

.wp-caption img {
	border: 0 none;
	height: auto;
	margin: 0;
	max-width: 98.5%;
	padding: 0;
	width: auto;
}

.wp-caption p.wp-caption-text {
	font-size: 12px;
	line-height: 1.5em;
	margin: 0;
	padding: 10px;
}

img.wp-smiley {
	vertical-align: middle;
}

/* =WordPress Gallery
-------------------------------------------------------------- */
.gallery {
	margin: 0 auto 18px;
}

.gallery .gallery-item {
	float: left;
	margin-top: 0;
	text-align: center;
	max-width: 155px;
}

.gallery img {
	border: 1px solid #ddd;
}

.gallery .gallery-caption {
	font-size: 12px;
	margin: 0 0 12px;
}

.gallery dl {
	margin: 0;
}

.gallery br+br {
	display: none;
}

.attachment-gallery img {
	background: #fff;
	border: 1px solid #f0f0f0;
	display: block;
	height: auto;
	margin: 15px auto;
	max-width: 96%;
	padding: 5px;
	width: auto;
}

.gallery-meta .iso, 
.gallery-meta .camera,
.gallery-meta .shutter,
.gallery-meta .aperture,
.gallery-meta .full-size,  
.gallery-meta .focal-length {
	display: block;
}

/* =Post Thumbnails 
-------------------------------------------------------------- */
img.wp-post-image,
img.attachment-full,
img.attachment-large, 
img.attachment-medium, 
img.attachment-thumbnail {
	display: block;
	margin: 15px auto;
	width: auto;
}

/* =WooCommerce
-------------------------------------------------------------- */
#breadcrumb {
	padding: 40px 0 0 0;
}

#breadcrumb a {
	color: #06c;
	font-size: 12px;
	font-weight: 400;
}

#breadcrumb a:hover {
	color: #444;
	text-decoration: none;
}

#content-woocommerce {
	margin-bottom: 20px;
}

.products ul, ul.products {
	margin-top: 40px;
}

.cart-collaterals .shipping_calculator {
	width: 100%;
}

table.shop_table {}

table.cart td.actions .coupon .input-text, 
table.cart td.actions .coupon .input-text {
	cursor: text;
}

/* =Footer
-------------------------------------------------------------- */
#footer {
	font-size: 11px;
	line-height: 1.5em;
}

#footer a {
	color: #333;
	font-weight: 400;
}

#footer a:hover {
    color: #444;
}

#footer-wrapper .grid.col-940 {
	margin: 0;
}

.scroll-top {
	text-align: center;
}

.copyright {
	text-align: left;
}

.powered {
	text-align: right;
}

/* =Social Icons
-------------------------------------------------------------- */
#footer .social-icons {
	list-style: none;
	line-height: normal;
    padding: 0;
	margin: 0;
	text-align: right;
}
#footer .yelp-icon, #footer .vimeo-icon, #footer .youtube-icon, #footer .twitter-icon, #footer .facebook-icon, #footer .linkedin-icon, #footer .rss-feed-icon, #footer .instagram-icon, #footer .pinterest-icon, #footer .four text-centersquare-icon, #footer .google-plus-icon, #footer .stumble-upon-icon {
    display: inline;
    margin: 1px;
    padding-left: 3px;
}
#header .social-icons{
    float: right;
}
#header .yelp-icon,
#header .vimeo-icon, 
#header .youtube-icon, 
#header .twitter-icon,
#header .facebook-icon, 
#header .linkedin-icon, 
#header .rss-feed-icon, 
#header .instagram-icon,
#header .pinterest-icon, 
#header .four text-centersquare-icon,
#header .google-plus-icon, 
#header .stumble-upon-icon {
	display: inline;
	margin: 1px;
	padding-left: 3px;
	
}

/* =Alignments Extras
-------------------------------------------------------------- */
.left {
	float: left;
}

.right {
	float: right;
}

.center {
	text-align: center;
}

/* =Clearfix
-------------------------------------------------------------- */
.clearfix:after,
.clearfix:before,
#container:after,
#container:before,
.widget-wrapper:after,
.widget-wrapper:before {
    content: ' ';
    display: table;
}

.clearfix:after,
#container:after,
.widget-wrapper:after {
    clear: both;
}

.ie7 .clearfix,
.ie7 #container,
.ie7 .widget-wrapper {
    zoom: 1;
}

.clear {
	clear: both;
}

/* =Begin bidirectionality settings (do not change)
-------------------------------------------------------------- */
BDO[DIR="ltr"] {
	direction: ltr;
	unicode-bidi: bidi-override;
}

BDO[DIR="rtl"] {
	direction: rtl;
	unicode-bidi: bidi-override;
}

[DIR="ltr"] {
   direction: ltr;
   unicode-bidi: embed;
}

[DIR="rtl"] {
   direction: rtl;
   unicode-bidi: embed;
}

/* =Media Print
    If you're working on a Child Theme, make sure that all
	media queries are included in your style.css
-------------------------------------------------------------- */
@media print {

    h1 {
	    page-break-before: always;
    }

    h1,  h2,  h3,  h4,  h5,  h6 {
	    page-break-after: avoid;
    }

    ul,  ol,  dl {
	    page-break-before: avoid;
    }
}

/*	Retina (HiDPI) Display
    http://www.quirksmode.org/blog/archives/2012/06/devicepixelrati.html
-------------------------------------------------------------- */
@media 
    only screen and (-moz-min-device-pixel-ratio:1.5), 
    only screen and (-o-min-device-pixel-ratio:3/2), 
    only screen and (-webkit-min-device-pixel-ratio:1.5), 
    only screen and (min-device-pixel-ratio:1.5) {
    
    body {}
}

/* =Responsive (Mobile) Design
-------------------------------------------------------------- */
@media screen and (max-width: 980px) {

    body {}
	
    .grid, 
	.grid-right {
	    float: none;
    }
	
	#featured-image .fluid-width-video-wrapper {
	    margin: 20px 0 0 0;
    }
	
	.home #widgets {
		margin-top: 40px;
	}
    
    .top-widget,
    .home .top-widget {
        margin-top: 0 !important;
    }
    
    .hide-980 {
        display: none;
    }
    
    .show-980 {
        display: block;
    }
    
}

@media screen and (max-width: 650px) {

    body {}

    #logo {
	    float: none;
        margin: 0;
	    text-align: center;
    }

    .grid, 
	.grid-right {
	    float: none;
    }

	#featured-image .fluid-width-video-wrapper {
	    margin: 20px 0 0 0;
    }
    
    .top-widget {
        float: none;
        margin: 0 auto 10px auto;
        position: relative;
        text-align: center;
        width: auto;
    }
    
    .top-widget .widget-title {
        text-align: center;
    }
	
    .js .menu,
	.js .sub-header-menu {
		display: none;
	}
	
	.top-menu, 
	.footer-menu li {
	    float: none;
        font-size: 11px;
	    text-align: center;
    }
	
	.tinynav {
        display: block;
    }
    
    .sb-holder {
        display: block;
    }
    
    #author-meta {
        padding: 20px;
    }
    
    .hide-650 {
        display: none;
    }
    
    .show-650 {
        display: block;
    }
    
    #footer {
	    text-align: center;
    }

    #footer .social-icons {
        padding-bottom: 10px;
	    text-align: center;
    }
#portfolio img{
	float: none ;
	text-align: center;
    }
}

@media screen and (max-width: 480px) {

    body {}

    #logo {
	    float: none;
	    text-align: center;
    }

    .grid, 
	.grid-right {
	    float: none;
    }
	
	#featured-image .fluid-width-video-wrapper {
	    margin: 20px 0 0 0;
	}
	
	.featured-title {
	    font-size: 40px;
	    padding: 40px 20px 0 20px
    }
    
    .featured-subtitle {
        font-size: 24px;
    }
    
    .navigation .next,
    .navigation .previous {
        display: block;
        margin: 0 auto;
        text-align: center;
    }
	
    .menu ul, 
	.menu li, 
	.top-menu, 
	.footer-menu li, 
	.sub-header-menu li {
	    float: none;
	    text-align: center;
        text-rendering: optimizeSpeed;
    }
	
    .hide-480 {
        display: none;
    }
    
    .show-480 {
        display: block;
    }
    
    #footer {
	    text-align: center;
    }

    #footer .social-icons {
	    text-align: center;
    }
    #portfolio img{
	clear: both;
    }
}

@media screen and (max-width: 480px) {
    
    body {}
	
	#featured p {
	    font-size: 12px;
		line-height: 1.5em;
    }

    .featured-title {
	    font-size: 35px;
    }
	
	.featured-subtitle {
		font-size: 15px;
	}

    .call-to-action a.button {
	    font-size: 14px;
	    padding: 7px 17px;
    }

    .hide-320 {
        display: none;
    }
    
    .show-320 {
        display: block;
    }
#portfolio img{
	clear: both;
    }
}

@media screen and (max-width: 480px) {
    
    body {}
	
	#featured p {
	    font-size: 11px;
		line-height: 1.5em;
    }

    .featured-title {
	    font-size: 20px;
    }
	
	.featured-subtitle {
		font-size: 11px;
	}

    .call-to-action a.button {
	    font-size: 12px;
	    padding: 5px 15px;
    }
    
    .top-widget area,
    .top-widget select,
    .top-widget textarea,
    .top-widget input[type="text"], 
    .top-widget input[type="password"] {
        width: 75%;
    }
    
    .widget-title,
    .widget-title-home h3 {
        font-size: 14px;
        height: 13px;
        line-height: 13px;
        text-align: left;
    }
    
    .hide-240 {
        display: none;
    }
    
    .show-240 {
        display: block;
    }
#portfolio img{
	clear: both;
    }
}

/*The last 29 days of the month are the hardest."- Nikola Tesla*/
body {
  background: none repeat scroll 0 0 #ffffff;
  color: #555555;
  font-family: georgia;
  font-size: 14px;
  line-height: 1.5em;
  text-rendering: optimizelegibility;
}

.menu {
  background-color: #EEEEEE;
  //background-image: -moz-linear-gradient(center top , #DC3523, #DC3523);
  clear: both;
  margin: 0 auto;
}
#text-5, #text-6, #text-7, #text-8, #text-9, #text-10{
  padding: 0;
  text-align: center;

}
.featured-title {
  color: #DC3523;
  font-size: 60px;
  letter-spacing: -1px;
  margin: 0;
  padding-top: 40px;
  text-align: center;
}
.widget-title, .widget-title-home h3 {
  color: #DC3523;
  display: block;
  font-size: 24px;
  font-weight: 700;
  line-height: 23px;
  margin: 0;
  padding: 0 0 20px;
  text-align: left;
}
#content #project {
  clear: both;
  margin: 20px 0;
  padding: 20px 0;
}
.social-icons{
  margin-top: 10px;
}
.home #wrapper {
    background-color: transparent;
    border: medium none;
    margin: 0 auto;
    padding: 0;
}
#logo{
    width: 200px;
}

#portfolio img {
  width: 150px;
}
#portfolio{
  clear: both;

}
h4 {
  font-size: 1.5em;
  margin-bottom: 0em;
  margin-top: 0em;
}
#ant-network {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #AAAAAA;
  background-image: -moz-linear-gradient(center top , #AAAAAA, #FFFFFF);
  border-bottom: 0 solid;
  border-radius: 0 0 10px 10px;
  border-image: none;
  border-left: 1px solid #B20B00;
  border-right: 1px solid #B20B00;
  color: #196FDB;
  padding: 5px;
  display: none;
}
#ant-network ul, ol {
  margin: 0;
}
#ant-network li{
  display: inline;
}
#ant-network a{
  color: #b20b00;
}
#ant-network b{
  font-weight: bold;
}

.btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
    border-radius: 0px 7px 7px 0px;
}

.menu.l_tinynav1{
  background: #610593;
  border-radius: 5px 5px 0 0;
}
#featured {
  background-color: #FFFFFF;
  border: 1px solid #E5E5E5;
  border-radius: 4px 4px 4px 4px;
  padding-bottom: 40px;
  width: 99.8936%;
  text-align: center;
}
#featured-image {
  text-align: center;
  margin: 30px 0 0;

}
.featured-title {
  color: #8327B5;
  font-size: 50px;
  letter-spacing: -1px;
  margin: 0;
  padding-top: 40px;
  text-align: center;
}
body {

  color: #555555;
  font-family: georgia;
  font-size: 14px;
  line-height: 1.5em;
  text-rendering: optimizelegibility;
}
.site-name a {
  color: #ffffff;
  font-weight: 700;
}
h4 {
  font-size: 1.5em;
  margin-bottom: 0;
  margin-top: 10px;
}
#logo {
    width: 220px;
    text-shadow: 0 -1px 0 #ffffff;
}
a.blue {
  background-color: #8327B5;
  background-image: -moz-linear-gradient(center top , #8327B5, #8327B5);
  border: 1px solid #115290;
  color: #FFFFFF;
  text-shadow: 0 -1px 0 #115290;
}
.widget-title, .widget-title-home h3 {
  color: #8327B5;
  display: block;
  font-size: 24px;
  font-weight: 700;
  line-height: 23px;
  margin: 0;
  padding: 0 0 20px;
  text-align: left;
}
#footer a {
  color: #ffffff;
  font-weight: 400;
}
#footer-wrapper {
 color: #dddddd;
}
#logo {
  text-shadow: 5px 3px 5px #8327B5;
  width: 220px;
  text-align: center;
  margin: 0 auto;
}
.menu .current_page_item a, .menu .current-menu-item a ,
.menu a:hover {
  background-color: #545454;
  border-radius: 5px 0 0 0;
}
#ws_widget__ad_codes-5, #ws_widget__ad_codes-6, #ws_widget__ad_codes-7 {
  background-color: transparent;
  border: 0 solid #E5E5E5;
  border-radius: 0 0 0 0;
  margin: 10px auto;
  padding: 0;
  text-align: -moz-left;
  width: 300px;
  height: 250px;
}
.page .widget-wrapper{
    background-color: transparent;
  border: 0 solid #E5E5E5;
  border-radius: 0 0 0 0;
  margin: 10px auto;
  padding: 0;
  text-align: -moz-left;
}
.top-menu li a {
  border-left: 1px solid #CCCCCC;
  color: #ffffff;
  font-size: 11px;
  padding: 0 4px 0 8px;
}
#container {

 min-width: 310px;
}

.widget-wrapper.ad-codes {
  margin-left: -15px;
}

#wrapper {

  border: 1px solid #E5E5E5;
  border-radius: 4px 4px 4px 4px;
  clear: both;
  margin: 20px auto;
  padding: 0 15px 15px;
  position: relative;
}
.col-620 {
  width: 64.957%;
}
.home #widgets {
  margin-top: 10px;
}
.widget-wrapper {

  border: 1px solid #E5E5E5;
  border-radius: 4px 4px 4px 4px;
  margin: 20px 0 0;
  padding: 20px;
}
.footer-menu {
  margin-top: 10px;

}
.col-620 h1{
  font-size: 2em;
}
.type-page img{
  width: 150px;
}
#menu-item-23 > a,
#menu-item-29 > a {
  font-size: 3em;
}
#menu-item-29 > a  {
  text-shadow: 5px 3px 5px #8327B5;
}
.call-to-action a.button {
    font-size: 24px;
    padding: 15px 35px;
}
a.blue {
    background-color: #8327B5;
    background-image: -moz-linear-gradient(center top , #8327B5, #8327B5);
    border: 1px solid #115290;
    color: #FFFFFF;
    text-shadow: 0 -1px 0 #115290;
}
a.blue {
    background-color: #1874cd;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#4f9eea), to(#1874cd));
    background-image: -webkit-linear-gradient(top, #4f9eea, #1874cd);
    background-image: -moz-linear-gradient(top, #4f9eea, #1874cd);
    background-image: -ms-linear-gradient(top, #4f9eea, #1874cd);
    background-image: -o-linear-gradient(top, #4f9eea, #1874cd);
    background-image: linear-gradient(top, #4f9eea, #1874cd);
    border: 1px solid #115290;
    color: #fff;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#4f9eea, endColorstr=#1874cd);
    text-shadow: 0 -1px 0 #115290;
}

</style>

	
	
	
	
	
<section id="main-content" class=" container text-center">
                 <div class="row batas">
     <section id="header hidden">

                        <ul id="secondary" class="menu"><li id="menu-item-34" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-34"><a target="_blank" href="https://web.archive.org/web/20130917192630/http://instaflixxx.com/">My InstaFliXXX Porn Network</a></li>
<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38"><a href="https://web.archive.org/web/20130917192630/http://followgq.com/36-2/">My Credentials</a></li>
</ul>  <div class="heading-menu text-center">
    <div id="head">
         <div class="text-center">
             <h1 class="site-title"><span><a href="https://web.archive.org/web/20130917192630/http://followgq.com/" title="Mr. GQ" rel="home">Mr. GQ</a></span></h1>
             <p class="site-description">
Changing the Game &#8211; GQ Style             </p>
        </div>                  
                          </div>


<!--                         <div class="alignright">    
<form role="search" method="get" id="searchform" action="http://followgq.com/" >
	<div><label class="screen-reader-text" for="s">Search for:</label>
	<input type="text" value="" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="Search" />
	</div>
	</form>                         </div>    
-->
                 </div>  
                     <div class="clearfix"></div>        
                                     <ul id="navmenu" class="menu"><li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14"><a href="https://web.archive.org/web/20130917192630/http://followgq.com/faqs/">FAQ&#8217;s</a></li>
<li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="https://web.archive.org/web/20130917192630/http://followgq.com/massage/">Massage</a></li>
<li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-5"><a href="/web/20130917192630/http://followgq.com/">Home</a></li>
</ul>                     <div class="clearfix"></div>



     </section>
                 </div>           
     <div class="six">
     <div class="general-landing text-center">
             
									<p class="centering hidden"><a href="https://web.archive.org/web/20130917192630/http://followgq.com/"><img src="https://web.archive.org/web/20130917192630im_/http://followgq.com/wp-content/uploads/2013/04/adc491be9d30d543feb535c12e39d3d7_3-225x300.jpg" alt="amdhas"/></a></p>
				                                               
         <div style="text-align: center; font-size: 20px; "><b>Current Location</b><div class='clearfix mb-10'></div> Philadelphia, PA<br>
<h3 style="text-align: center; font-size: 25px; "><a href="https://web.archive.org/web/20130917192630/http://followgq.com/?page_id=126">-Contact Me-</a></h3><br>
<h5 style="text-align: center; font-size: 14px; "><a target="_blank" href="https://web.archive.org/web/20130917192630/http://instaflixxx.com/">-I'd Rather Not-</a></h5>
</div>  
     </div>
  
     </div>
     <div class="six">
     <div class="intro-home text-center">
         <h2>A Little Bit About Mr. GQ</h2>
         Very polite/well rounded individual with great skin, a sense of humor, and a nice body. Full Time Software Engineer by day, Massage Therapist/escort by night. Beyond experienced, Handsome and intelligent willing and wanting-to satisfy all of your most sincere or naughtiest desires. A smooth, strong and passionate brother guaranteed to tantalize all of your senses. Tested Neg (Jan-2013)
<br><br><center><a style="font-size: 20px; color: #AB0707;" href="/web/20130917192630/http://followgq.com/text">-Subscribe to TXT Updates-</a></center><br>
<div style="font-size: 20px; text-align: center;">
<h4>Session Rates</h4>
$60 - Half Hour<br>
$100 - Full Hour<br>
$150 - VIP Session<br>
Extended Sessions/Special Requests Vary
</div>
<center>*$20 Travel Fee</center>  
    <p class="centering text-center">
             <a href="https://web.archive.org/web/20130917192630/http://followgq.com/?page_id=55" class="tombol button">View Photo Gallery</a>  
  
    </p>       
    </div>
    </div> 
                     <div class="row">                        
     <div class="col-md-4 well">
<div class="side-home"><h3>Massage Services</h3>			<div class="textwidget">I offer professional and discreet massage, light to moderate pressure,
in a relaxed and private setting. I have over five years experience and
can tailor a perfect session for your enjoyment.
</div>
		</div>    </div>
     <div class="col-md-4 well">
<div class="side-home"><h3>Companionship Services</h3>			<div class="textwidget">Mr GQ is your solution for personalized companionship in the comfort of your home. I truly value the importance of compassion, dignity, and respect for all of my clients across all stages of life. 
</div>
		</div>     </div>  
                              
     <div class="col-md-4 well">
<div class="side-home"><h3>Computer Service</h3>			<div class="textwidget">Is your computer running really slow? Are you getting pop ups and advertisements even when your not surfing the internet? It could be a virus. No matter what kind of PC you have, Mr GQ can fix it.
</div>
		</div>     </div>
                                          
                     <div class="clear"></div> 
</div> 					 
     <div class="six">
        
     </div>
     <div class="six">
        
     </div>                                                        
                     <div class="clearfix"></div>       
                     <div class="clearfix"></div>
     <footer class="row2 credit">
         <div id="socialmedia_icons">
                
         </div>        
         <div class="text-center">
         <p class="brand-note"><a href="https://web.archive.org/web/20130917192630/http://followgq.com/" title="Mr. GQ">
Mr. GQ</a> |<a style="" href="https://web.archive.org/web/20130917192630/http://info.flagcounter.com/hLI0"><img src="https://web.archive.org/web/20130917192630im_/http://s05.flagcounter.com/mini/hLI0/bg_FFFFFF/txt_000000/border_CCCCCC/flags_0/" alt="Flag Counter" border="0"></a> |  Powered By: <a href="https://web.archive.org/web/20130917192630/http://www.gqlist.com/">GQList.com</a></p>
       
  </div>
                     <div class="clearfix"></div>
     </footer>
</section>



	

	<div class=" container hidden ">
		<div id="featured" class=" container well">
        
        <div class=" col-md-6">

            <h1 class="featured-title">Elite Escorts</h1>                    
            <h2 class="featured-subtitle">Just a Phone Call Away</h2>            
            <p>Your fantasy &amp; desires will finally come true! At GQList you will be able to search and view some of Americas most exclusive and desirable high class and elite escorts. Where ever you are in America, we're working on featuring private escorts  in every major city.
</p>            
            		         
            <div class="call-to-action">

            <a href="/companions" class="blue button">View Escorts &rarr;</a>  
            
            </div><!-- end of .call-to-action -->
                     
            
        </div><!-- end of .col-460 -->
		
		<div class=" col-md-2 hidden "> 
				<br>
		</div>
        <div id="featured-image" class="text-center col-md-6 "> 
                           
            <h3>Newest Model</h3>
<img style="width: 200px;" src="https://web.archive.org/web/20130612075545im_/http://gqlist.com/kimcarta/wp-content/uploads/sites/9/2013/04/Kim11.png"><h4>
Kim Carta
</h4><h5>
Hampton Roads

</h5><a href="https://web.archive.org/web/20130612075545/http://gqlist.com/kimcarta

">&gt;View Profile&lt;</a> 
                                   
        </div><!-- end of #featured-image --> 
        <div class='clearfix'></div><br>
        </div>
		
		
	
	</div>



<div class='clearfix'></div><br>

<!-- end GQListings --> 




<div id="primary" class="hidden ">


					
							
			
	
	<div id='add-gallery' style='display: block;' class='hidden text-center <?php if ( /*!is_user_logged_in()*/ 0  ) { echo "hidden"; } ?>'>
			
			
			<div class="btn-group hidden " >
				
				
					<button id='add-gallery' class='hidden-print hidden1 btn btn-default btn-lg btn-block1'>Quick Post</button>
					<a href='/freak-post' class='hidden-print btn  btn-primary btn-lg btn-block1'> Full Post >></a>
					<hr>
			</div>
		</div>
	
		<div class='clear'></div>	

		<div id='add-gallery' style='display: none;' >
			<div class='clear'></div>	
			<div class="col-md-10 col-md-offset-1  home-beta">
			<center><h3> New Post! </h3></center><br>
			</div>
			<div class="col-md-10 col-md-offset-1 text-left">
			<div class="well">
			
			<?php //echo do_shortcode('[gravityform id="11" title="false" description="false"]');
			
			echo do_shortcode('[gravityform id="40" title="false" description="false"]
			');
			
			?></div>
			<div class='clear'></div>	
			<button id='add-gallery' class='hidden-print btn btn-default btn-sm'>x close</button>
			<div class='clear'></div>	<br>
			</div>
		</div>
	<div class='clearfix'></div><br>
			
			

	<div class=' '><div class='col-md-10 well green'>
	
		<br>

	
<?php




		$args = array( 'post_type' => 'ssi_requests', 'posts_per_page' => -1 , 'post_status' => array('pending', 'publish') );

		//$leads = get_posts( $args );
		
		$count = 0;
		$skipped = 0;

		//print_r( $leads );
		foreach( $leads as $lead ){ 
			
		//	if( !is_user_logged_in() && get_field( 'member_level', $lead->ID ) != 'Public' ){ $skipped++; continue; }else{ $count++; }
	?>
	
		<div class='video-set col-md-12 well1'>
			<div class='col-md-12'>

				
			<?php 
				echo "<div class='' >";
			//	echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
					if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        						echo '</a>';

   					 	}
					}
				echo "</div>";
				?>
				<!--<a href='/photo/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'></a>
				-->
			</div>

			<div class='col-md-4 hidden'>
					<div class='visible-xs'><br><br></div>
					<h4>Photo Set</h4>
					<hr>
					
				<?php
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
						echo do_shortcode($shortcode);

				 ?>
				<div class='clear'></div><br><br>

				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="<?php echo $lead->guid; ?>">View Preview</a></p>
				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/subscribe/">Subscribe Now!</a></p>
			</div>
			<div class='clear'></div>
			
			<h4> <a href='/?p=<?php echo $lead->ID; ?>'> <?php echo $lead->post_title; ?> </a> <small>  ( <?php echo get_post_meta($lead->ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($lead->ID, 'MX_user_state', true); ?> ) -- <?php echo get_the_date( 'F d - h:i A' , $lead->ID ); ?> </small></h4>
			
			<div class='clear'></div><br>
		</div>
		
		
		<?php 

		//if( ($count % 3) == 0){ echo "<div class='clear'></div>";}

		}// #END forach
	?>
</div>
	
		 <div class='col-md-2 hidden-xs text-center img-thumbnail'>
			<!--JuicyAds v2.0 --  Photo Skyscraper -->
			<center>
			<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=160 height=612 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=516829></iframe>
			</center>
			<!--JuicyAds END-->
		</div>
		
				<div class='clear'></div>
				
	
</div>
	
</div><!-- .content-area -->

<?php // get_template_part( 'content', 'welcome-rsvp' ); ?>

<?php 
	get_footer('preview'); 
?>