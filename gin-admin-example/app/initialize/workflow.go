package initialize

import "gin-admin-example/model"

func initWorkflowModel() {
	model.WorkflowBusinessStruct = make(map[string]func() model.GAE_Workflow)
	model.WorkflowBusinessStruct["leave"] = func() model.GAE_Workflow {
		return new(model.ExaWfLeaveWorkflow)
	}
}

func initWorkflowTable() {
	model.WorkflowBusinessTable = make(map[string]func() interface{})
	model.WorkflowBusinessTable["leave"] = func() interface{} {
		return new(model.ExaWfLeave)
	}
}

// InitWkMode to initialize workflow model & table.
func InitWkMode() {
	initWorkflowModel()
	initWorkflowTable()
}
