package router

import (
	v1 "gin-admin-example/api/v1"
	"gin-admin-example/middleware"

	"github.com/gin-gonic/gin"
)

// InitAPIRouter to defined api router.
func InitAPIRouter(Router *gin.RouterGroup) {
	APIRouter := Router.Group("api").Use(middleware.OperationRecord())
	{
		APIRouter.POST("createAPI", v1.CreateAPI) // 创建 Api
		// ApiRouter.POST("deleteApi", v1.DeleteApi)   // 删除 Api
		// ApiRouter.POST("getApiList", v1.GetApiList) // 列表 Api
		// ApiRouter.POST("getApiById", v1.GetApiById) // 详情 Api
		// ApiRouter.POST("updateApi", v1.UpdateApi)   // 更新 Api
		// ApiRouter.POST("getAllApis", v1.GetAllApis) // 所有 Api
	}
}
