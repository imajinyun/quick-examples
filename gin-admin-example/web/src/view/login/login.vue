<template>
  <div id="userLayout" class="user-layout-wrapper">
    <div class="container">
      <div class="top">
        <div class="desc">
          <img class="logo_login" src="@/assets/logo_login.png" alt="" />
        </div>
        <div class="header">
          <a href="/">
            <img src="~@/assets/logo.png" class="logo" alt="logo" />
            <!-- <span class="title">Gin-Admin-Example</span> -->
          </a>
        </div>
      </div>
      <div class="main">
        <el-form
          :model="loginForm"
          :rules="rules"
          ref="loginForm"
          @keyup.enter="submitForm"
        >
          <el-form-item prop="username">
            <el-input placeholder="请输入用户名" v-model="loginForm.username">
              <i class="el-input__icon el-icon-user"></i>
            </el-input>
          </el-form-item>
          <el-form-item prop="password">
            <el-input
              :type="lock === 'lock' ? 'password' : 'text'"
              placeholder="请输入密码"
              v-model="loginForm.password"
            >
              <i
                :class="'el-input__icon el-icon-' + lock"
                @click="changeLock"
              ></i>
            </el-input>
          </el-form-item>
          <el-form-item style="position: relative">
            <el-input
              v-model="loginForm.captcha"
              name="logVerify"
              placeholder="请输入验证码"
              style="width: 60%"
            />
            <div class="vPic">
              <img
                v-if="picPath"
                :src="picPath"
                width="100%"
                height="100%"
                alt="请输入验证码"
                @click="loginVefify()"
              />
            </div>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="submitForm" style="width: 100%"
              >登 录</el-button
            >
          </el-form-item>
        </el-form>
      </div>

      <div class="footer">
        <div class="links">
          <a href="http://doc.henrongyi.top/"
            ><img src="@/assets/docs.png" class="link-icon"
          /></a>
          <a href="https://www.yuque.com/flipped-aurora/"
            ><img src="@/assets/yuque.png" class="link-icon"
          /></a>
          <a href="https://github.com/flipped-aurora/gin-vue-admin"
            ><img src="@/assets/github.png" class="link-icon"
          /></a>
          <a href="https://space.bilibili.com/322210472"
            ><img src="@/assets/video.png" class="link-icon"
          /></a>
        </div>
        <div class="copyright">
          Copyright &copy; {{ curYear }} 💖 flipped-aurora
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "Login",
  data() {},
  method: {
    ...mapActions("user", ["LoginIn"]),
    async login() {},
  },
};
</script>

<style scoped lang="scss">
@import "@/style/login.scss";
</style>
