package v1

import (
	"gin-admin-example/global"
	"gin-admin-example/model"
	"gin-admin-example/model/request"
	"gin-admin-example/model/response"
	"gin-admin-example/service"
	"gin-admin-example/util"

	"github.com/gin-gonic/gin"
	"go.uber.org/zap"
)

// Login func.
func Login(c *gin.Context) {
	var L request.Login
	_ = c.ShouldBindJSON(&L)
	if err := util.Verify(L, util.LoginVerify); err != nil {
		response.FailWithMessage(err.Error(), c)
		return
	}
	if store.Verify(L.CaptchaID, L.Captcha, true) {
		U := &model.SysUser{Username: L.Username, Password: L.Password}
		if err, user := service.Login(U); err != nil {
			global.GAE_LOG.Error("登陆失败! 用户名不存在或者密码错误", zap.Any("err", err))
			response.FailWithMessage("用户名不存在或者密码错误", c)
		} else {
			tokenNext(c, *user)
		}
	} else {
		response.FailWithMessage("验证码错误", c)
	}
}
