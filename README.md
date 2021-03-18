# APEX FRIENDS

<div align="center">  
  
Frontend  
<img src="https://user-images.githubusercontent.com/66376047/109164124-6a3f7500-77bd-11eb-8630-066ff1fc8492.png" width="80px" height="80px">
<img src="https://user-images.githubusercontent.com/66376047/109164201-80e5cc00-77bd-11eb-9f55-860f2da26d02.png" width="80px" height="80px">  

Backend  
<img src="https://user-images.githubusercontent.com/66376047/109164234-88a57080-77bd-11eb-8420-21d86a953676.png" width="80px" height="80px">
<img src="https://user-images.githubusercontent.com/66376047/109164258-8f33e800-77bd-11eb-8a98-a0374355b250.png" width="120px" height="60px">  

Test  
<img src="https://user-images.githubusercontent.com/66376047/110118701-1ad0f880-7dfe-11eb-8d86-cc8dd02c4ca8.png" width="80px" height="80px">
<img src="https://user-images.githubusercontent.com/66376047/110118723-23293380-7dfe-11eb-8c8e-09d116f170eb.png" width="140px" height="100px">

</div>

## Overview
ApexLegendsのフレンド・クラブ募集用掲示板

## Purpose
・フレンドとクラブを同一サイト内で募集するため  
・絞り込み検索機能で目的の情報を素早く取得するため  
・投稿がテンプレート化された、統一性のある情報を取得するため

## Usage
**1.投稿閲覧について**  
トップページに投稿一覧画面があるので、アクセスすればすぐに投稿を見ることができます。また、タグボタンを押すことで、同ページ内でフレンド投稿・クラブ投稿を切り替えて見ることができます。  
  
**2.投稿について**  
画面右下の投稿ボタン:pencil:から投稿画面に移動できます。画面上部のタグでフレンド・クラブを切り替えることができます。必要項目を全て入力してから投稿ボタンを押すことで投稿できます。  

## Features
・シングルページアプリケーション設計による快適な操作感  
・フロントエンドとバックエンドを分離させた開発方法  
・投稿画面から閲覧画面に戻った時に、さっきまで見ていたタグとページを保持（続きから見れる）  
・投稿画面でフレンドとクラブを切り替えても入力内容を保持

## Version
backend  
PHP:7.4.12  
laravel:8.12.0  
phpunit:9.3.3  
Node:12.16.2  
npm:6.14.4  
mysql:5.7.32  
  
frontend  
nuxt:2.14.6  
@vue/cli:4.5.8  
@nuxtjs/vuetify:1.11.2  
@vue/test-utils:1.1.0  
babel-core:7.0.0-bridge.0  
@nuxtjs/axios:5.12.2  
vuex:3.5.1  
jest:26.5.0   

## App URL
https://apexfriends.herokuapp.com 
