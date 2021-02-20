### **WIP**

- [ ] filter on home page

- [ ] social share

### **DONE**

- [x] no recaptcha on localhost

- [x] expire date

- [x] responsive

- [x] post validation

- [x] input text sanitize

- Token
  - [x] changed new post with token input, generated from controller, user can also change if they want
  - [x] post data submit with token
  - [x] hash the token at the controller and save to db

- Refactor post token feature
  - [x] remove token col
  - [x] add email col
  - [x] remove token feature
  - [x] email is encrypted

- Comments
  - [x] show comments on post
  - [x] anon can submit comment
  - [x] comments are encrypted
  - [x] only OP can read the comments by entering token

- Refactor comment feature
  - [x] everyone can see comments
  - [x] remove contact and like_by columns
  - [x] add is_message column
  - [x] submit as comment or send as message button
  - [x] text encrypted
  - [x] messages are sent to OP email directly
  - [x] messages are not shown as comment
