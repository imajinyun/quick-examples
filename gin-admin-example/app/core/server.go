package core

import (
	"fmt"
	"gin-admin-example/global"
	"gin-admin-example/initialize"
	"time"

	"go.uber.org/zap"
)

type server interface {
	ListenAndServe() error
}

// RunWindowsServer to run a server.
func RunWindowsServer() {
	if global.GAE_CONFIG.System.UseMultipoint {
		initialize.Redis()
	}
	initialize.InitWkMode()
	Router := initialize.Routers()

	address := fmt.Sprintf(":%d", global.GAE_CONFIG.System.Addr)
	s := initServer(address, Router)
	time.Sleep(10 * time.Microsecond)
	global.GAE_LOG.Info("server run success on ", zap.String("address", address))

	fmt.Printf(`
	欢迎使用 Gin-Admin-Example
	当前版本: v1.0.0
	默认自动化文档地址: http://127.0.0.1%s/swagger/index.html
	默认前端文件运行地址: http://127.0.0.1:8080
	`, address)
	global.GAE_LOG.Error(s.ListenAndServe().Error())
}
