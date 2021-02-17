### **WIP**

- [ ] post validation
  - [ ] title length, token length

- [ ] refactor post token feature
  - [x] remove token col
  - [x] add email col
  - [x] remove token feature
  - [x] email is encrypted

- [ ] refactor comment feature
  - [x] everyone can see comments
  - [x] remove contact and like_by columns
  - [x] add is_message column
  - [ ] submit as comment or send as message button
  - [x] text encrypted
  - [ ] messages are sent to OP email directly
  - [ ] messages are not shown as comment

- [x] responsive
  - [ ] radio input display issue on mobile

### **TODO**

- [ ] share feature
  - [ ] to social media
  - [ ] shorten url [Polr](https://github.com/cydrobolt/polr/)
    , [laravel-url-shortener](https://github.com/LaraCrafts/laravel-url-shortener)
  - [ ] qr code [simple-qrcode](https://github.com/SimpleSoftwareIO/simple-qrcode)
    , [guide](https://kerneldev.com/qr-codes-in-laravel-complete-guide/)

- [ ] edit feature

- [ ] api feature
  - [ ] check necessary attributes to hide
  - [ ] security

- [ ] auth feature

- [ ] switch to vuikit ?

- [ ] csrf ?

- [ ] admin feature
  - [Orchid Admin](https://www.notion.so/Orchid-Admin-6cf1211499b347f68dad4b00152cffe0)

- [ ] remove presenter composer package ?

- [ ] post repository, use requests feature

- [ ] translate noti text

- [ ] get() vs all()

- [ ] cron to auto update expired posts status

- [ ] refactor controllers

### **DONE**

- [x] no recaptcha on localhost

- [x] expire date

- Token
  - [x] changed new post with token input, generated from controller, user can also change if they want
  - [x] post data submit with token
  - [x] hash the token at the controller and save to db

- Comments
  - [x] show comments on post
  - [x] anon can submit comment
  - [x] comments are encrypted
  - [x] only OP can read the comments by entering token
