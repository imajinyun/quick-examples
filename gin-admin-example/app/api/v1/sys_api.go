package v1

import (
	"gin-admin-example/global"
	"gin-admin-example/model"
	"gin-admin-example/model/response"
	"gin-admin-example/service"
	"gin-admin-example/util"

	"github.com/gin-gonic/gin"
	"go.uber.org/zap"
)

// CreateAPI to create a new API.
func CreateAPI(c *gin.Context) {
	var api model.SysAPI
	_ = c.ShouldBindJSON(&api)
	if err := util.Verify(api, util.APIVerify); err != nil {
		response.FailWithMessage(err.Error(), c)
		return
	}
	if err := service.CreateAPI(api); err != nil {
		global.GAE_LOG.Error("创建失败!", zap.Any("err", err))
		response.FailWithMessage("创建失败", c)
	} else {
		response.OkWithMessage("创建成功", c)
	}
}
